<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::create([
            'name' => 'EBUSi',
            'currency_id' => 134,
            // 'start_date' => '',
            // 'tax_number_1' => 100,
            // 'tax_label_1' => 10,
            // 'tax_number_2' => '',
            // 'tax_label_2' => '',
            'default_profit_percent' => 15.00,
            // 'owner_id' => 1,
            'time_zone' => 'Asia/Kolkata',
            'fy_start_month' => 6,
            'accounting_method' => 'fifo',
            // 'default_sales_discount' => '',
            'sell_price_tax' => 'includes',
            // 'logo' => '1659865520_ebusi-logo-2.png',
            'expiry_type' => 'add_expiry',
            'on_product_expiry' => 'keep_selling',
            'enable_tooltip' => 1,
            'p_exchange_rate' => 1.000,
            'transaction_edit_days' => 30,
            'is_active' => 1,
        ]);
    }
}
