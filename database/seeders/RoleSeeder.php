<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ]);
        $staffRole = Role::create(['name' => 'staff']);

        $staffRole->givePermissionTo([
            'product-list'
        ]);
        $userRole = Role::create(['name' => 'user']);

        $userRole->givePermissionTo([
            'product-list'
        ]);
    }
}
