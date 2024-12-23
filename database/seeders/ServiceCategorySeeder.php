<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('service_categories')->insert([
            ['category' => 'Regular Cleaning'],
            ['category' => 'Deep Cleaning'],
            ['category' => 'Move-in-Move-Out Cleaning'],
        ]);
    }
}
