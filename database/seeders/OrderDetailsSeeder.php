<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            'id' => 1,
            'order_id' => 1,
            'product_id' => 1,
            'product_price' => 1500,
            'color_id' => 1,
            'size_id' => 1,
            'qty' => 1,
        ]);
        DB::table('order_details')->insert([
            'id' => 2,
            'order_id' => 1,
            'product_id' => 2,
            'product_price' => 1000,
            'color_id' => 2,
            'size_id' => 2,
            'qty' => 1,
        ]);
        DB::table('order_details')->insert([
            'id' => 3,
            'order_id' => 2,
            'product_id' => 1,
            'product_price' => 1000,
            'color_id' => 2,
            'size_id' => 2,
            'qty' => 1,
        ]);
        DB::table('order_details')->insert([
            'id' => 4,
            'order_id' => 2,
            'product_id' => 2,
            'product_price' => 1000,
            'color_id' => 2,
            'size_id' => 2,
            'qty' => 1,
        ]);
        DB::table('order_details')->insert([
            'id' => 5,
            'order_id' => 2,
            'product_id' => 3,
            'product_price' => 1000,
            'color_id' => 2,
            'size_id' => 2,
            'qty' => 1,
        ]);
    }
}
