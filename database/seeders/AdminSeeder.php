<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        $permissions = [
            'dashboard_access',
            'audit_log_access',
            'audit_log_show',
            'comment_access',
            'comment_delete',
            'comment_show',
            'comment_edit',
            'comment_create',
            'ticket_access',
            'ticket_delete',
            'ticket_show',
            'ticket_edit',
            'category_delete',
            'category_access',
            'deposit_permission'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $pManagerRole = Role::create(['name' => 'p-manager']);
        $branchManagerRole = Role::create(['name' => 'branch-manager']);

        // Assign permissions
        $adminRole->givePermissionTo($permissions);
        $managerRole->givePermissionTo([
            'deposit_permission',
            'audit_log_access',
            'comment_access',
            'ticket_access',
            'category_delete',
            'category_access'
        ]);
        $pManagerRole->givePermissionTo([
            'deposit_permission',
            'audit_log_access',
            'comment_access',
            'ticket_access',
            'category_delete',
            'category_access'
        ]);
        $branchManagerRole->givePermissionTo([
            'deposit_permission',
            'audit_log_access',
            'comment_access',
            'ticket_access',
            'category_delete',
            'category_access'
        ]);

        // Create Admin User
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole('admin');
    }
}
