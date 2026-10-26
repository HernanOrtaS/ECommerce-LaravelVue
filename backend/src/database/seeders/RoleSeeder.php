<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_manager = Role::create(['name' => 'manager']);
        $role_cashier = Role::create(['name' => 'cashier']);

        $permission_create_role = Permission::create(['name' => 'create role']);
        $permission_read_role = Permission::create(['name' => 'read role']);
        $permission_update_role = Permission::create(['name' => 'update role']);
        $permission_delete_role = Permission::create(['name' => 'delete role']);

        $permission_create_user = Permission::create(['name' => 'create user']);
        $permission_read_user = Permission::create(['name' => 'read user']);
        $permission_update_user = Permission::create(['name' => 'update user']);
        $permission_delete_user = Permission::create(['name' => 'delete user']);

        $permission_create_category = Permission::create(['name' => 'create category']);
        $permission_read_category = Permission::create(['name' => 'read category']);
        $permission_update_category = Permission::create(['name' => 'update category']);
        $permission_delete_category = Permission::create(['name' => 'delete category']);

        $permission_create_sub_category = Permission::create(['name' => 'create sub_category']);
        $permission_read_sub_category = Permission::create(['name' => 'read sub_category']);
        $permission_update_sub_category = Permission::create(['name' => 'update sub_category']);
        $permission_delete_sub_category = Permission::create(['name' => 'delete sub_category']);

        $permission_create_product = Permission::create(['name' => 'create product']);
        $permission_read_product = Permission::create(['name' => 'read product']);
        $permission_update_product = Permission::create(['name' => 'update product']);
        $permission_delete_product = Permission::create(['name' => 'delete product']);

        $permission_create_discount = Permission::create(['name' => 'create discount']);
        $permission_read_discount = Permission::create(['name' => 'read discount']);
        $permission_update_discount = Permission::create(['name' => 'update discount']);
        $permission_delete_discount = Permission::create(['name' => 'delete discount']);

        $permissions_admin = [
            $permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role,
            $permission_create_user, $permission_read_user, $permission_update_user, $permission_delete_user,
            $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category,
            $permission_create_sub_category, $permission_read_sub_category, $permission_update_sub_category, $permission_delete_sub_category,
            $permission_create_product, $permission_read_product, $permission_update_product, $permission_delete_product,
            $permission_create_discount, $permission_read_discount, $permission_update_discount, $permission_delete_discount,
        ];

        $permissions_manager = [
            $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category,
            $permission_create_sub_category, $permission_read_sub_category, $permission_update_sub_category, $permission_delete_sub_category,
            $permission_create_product, $permission_read_product, $permission_update_product, $permission_delete_product,
            $permission_create_discount, $permission_read_discount, $permission_update_discount, $permission_delete_discount,
        ];

        $role_admin->syncPermissions($permissions_admin);
        $role_manager->syncPermissions($permissions_manager);

        
    }
}
