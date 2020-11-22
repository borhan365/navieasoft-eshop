<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory()->create();
        \App\Models\Vendor::factory()->create();
        \App\Models\Importer::factory()->create();
        \App\Models\Merchant::factory()->create();
        \App\Models\Customer::factory()->create();
    }
}
