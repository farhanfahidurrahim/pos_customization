<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Laptop',
            'business_id'=>1,
        	'short_code' => 'lptp',
        	'paredt_id' => 0,
            'created_by' => 1,
        ]);
    }
}
