<?php

namespace Database\Seeders;

use App\Models\User;
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
        /**
         * Create roles
         */
        Role::upsert([
            ['name' => 'Admin', 'guard_name' => 'web'],
            ['name' => 'Manager', 'guard_name' => 'web'],
            ['name' => 'User', 'guard_name' => 'web'],
        ], ['name']);

        /**
         * Assigning permissions to roles and roles to users
         */
        foreach (Role::all() as $role) {
            if ($role->name === 'Admin') {
                $permissions = Permission::pluck('id', 'id')->all();
                $role->syncPermissions($permissions);

                User::find(1)->assignRole($role->name);
            } elseif ($role->name === 'Manager') {
                $permissions = Permission::whereNot('name', 'delete products')->pluck('id', 'id')->toArray();
                $role->syncPermissions($permissions);

                User::find(2)->assignRole($role->name);
            } else {
                $permissions = Permission::whereName('view products')->pluck('id', 'id')->toArray();
                $role->syncPermissions($permissions);

                User::find(3)->assignRole($role->name);
            }
        }
    }
}
