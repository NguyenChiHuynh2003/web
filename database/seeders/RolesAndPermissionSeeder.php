<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ----- Tạo quyền cho User -----
        $readUserPermission = Permission::create(['name' => 'read: user']);

        // ----- Tạo quyền cho Admin -----
        $createUserPermission = Permission::create(['name' => 'create: user']);
        $updateUserPermission = Permission::create(['name' => 'update: user']);
        $deleteUserPermission = Permission::create(['name' => 'delete: user']);
        $readAdminPermission  = Permission::create(['name' => 'read: admin']);
        $updateAdminPermission  = Permission::create(['name' => 'update: admin']);

        // ----- Tạo Role và gán quyền -----

        // Role user chỉ có quyền đọc thông tin người dùng
        $userRole = Role::create(['name' => 'user']);
        $userRole->syncPermissions([$readUserPermission]);

        // Role admin có quyền quản lý người dùng và một số quyền admin
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions([
            $createUserPermission,
            $readUserPermission,
            $updateUserPermission,
            $deleteUserPermission,
            $readAdminPermission,
            $updateAdminPermission,
        ]);
    }
}
