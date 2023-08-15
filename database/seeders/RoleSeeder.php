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
        Role::create([
            'name'=>'superadmin',
        	'guard_name' => 'web',
            'business_id'=> 1,
        	'is_default' => 0,
            'is_service_staff' => 0,
        ]);

        Role::create([
            'name'=>'Customers#1',
        	'guard_name' => 'web',
            'business_id'=> 1,
        	'is_default' => 0,
            'is_service_staff' => 0,
        ]);

        Role::create([
            'name'=>'Suppliers#1',
        	'guard_name' => 'web',
            'business_id'=> 1,
        	'is_default' => 0,
            'is_service_staff' => 0,
        ]);
    }
}
