<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $supplier = Role::firstOrCreate(['name' => 'Supplier']);
        $publisher = Role::firstOrCreate(['name' => 'Publisher']);
    }
}
