<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create permissions
         */
        Permission::upsert([
            ['id' => 1, 'name' => 'view products', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'create products', 'guard_name' => 'web'],
            ['id' => 3, 'name' => 'edit products', 'guard_name' => 'web'],
            ['id' => 4, 'name' => 'delete products', 'guard_name' => 'web'],
        ], ['id']);
    }
}
