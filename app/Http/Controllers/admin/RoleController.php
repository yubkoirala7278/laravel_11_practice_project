<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    // List all roles
    public function index()
    {
        try {
            $roles = Role::with('permissions')->get();
            $permissions = Permission::all();
            return view('admin.user.role', compact('roles', 'permissions'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // Store a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        try {
            DB::beginTransaction();
            $role = Role::create(['name' => $request->name]);
            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }
            DB::commit();
            return response()->json(['success' => 'Role created successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Show a single role
    public function show(Role $role)
    {
        try {
            $role->load('permissions');
            return response()->json($role);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Update a role
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        try {
            DB::beginTransaction();
            $role->update(['name' => $request->name]);
            $role->syncPermissions($request->permissions ?? []);
            DB::commit();
            return response()->json(['success' => 'Role updated successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Delete a role
    public function destroy(Role $role)
    {
        try {
            // Prevent deletion of critical roles
            if ($role->name === 'super-admin') {
                return response()->json(['error' => 'Cannot delete super-admin role'], 403);
            }
            $role->delete();
            return response()->json(['success' => 'Role deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Bulk delete roles
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',
        ]);

        try {
            DB::beginTransaction();
            $roles = Role::whereIn('id', $request->role_ids)->where('name', '!=', 'super-admin')->delete();
            DB::commit();
            return response()->json(['success' => 'Selected roles deleted successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
