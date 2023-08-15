<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        $this->call(BarcodesTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        //$this->call(BusinessSeeder::class);
    //    $this->call(RoleSeeder::class);
    //    $this->call(CreateAdminUserSeeder::class);

    }


}
