<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    // List all users
    public function index()
    {
        try {
            $users = User::with('roles')->get();
            $roles = Role::all();
            return view('admin.user.index', compact('users', 'roles'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // Show create user form
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
            ]);
            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }
            DB::commit();
            return response()->json(['success' => 'User created successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Show a single user
    public function show(User $user)
    {
        try {
            $user->load('roles');
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Show edit user form
    public function edit(User $user)
    {
        $roles = Role::all();
        $user->load('roles');
        return view('admin.user.edit', compact('user', 'roles'));
    }

    // Update a user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            $user->syncRoles($request->roles ?? []);
            DB::commit();
            return response()->json(['success' => 'User updated successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Delete a user
    public function destroy(User $user)
    {
        try {
            if ($user->hasRole('super-admin')) {
                return response()->json(['error' => 'Cannot delete super-admin user'], 403);
            }
            $user->delete();
            return response()->json(['success' => 'User deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Bulk delete users
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        try {
            DB::beginTransaction();
            $users = User::whereIn('id', $request->user_ids)->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super-admin');
            })->delete();
            DB::commit();
            return response()->json(['success' => 'Selected users deleted successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Toggle user status (enable/disable)
    public function toggleStatus(Request $request, User $user)
    {
        try {
            if ($user->hasRole('super-admin')) {
                return response()->json(['error' => 'Cannot disable super-admin user'], 403);
            }
            $user->update(['is_active' => !$user->is_active]);
            $status = $user->is_active ? 'enabled' : 'disabled';
            return response()->json(['success' => "User $status successfully"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
