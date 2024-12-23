<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('positions')->insert([
            ['position' => 'General Manager', 'salary' => '650000'],
            ['position' => 'Operations Manager', 'salary' => '450000'],
            ['position' => 'Customer Service Representative', 'salary' => '280000'],
            ['position' => 'House Keeper', 'salary' => '180000'],
            ['position' => 'Deep Cleaning Specialist', 'salary' => '230000'],
            ['position' => 'Laundry Specialist', 'salary' => '200000'],
            ['position' => 'Move-in-Move-out Cleaning Specialist', 'salary' => '250000'],
            ['position' => 'Team Leader', 'salary' => '300000'],
            ['position' => 'Maintenance', 'salary' => '250000'],
            ['position' => 'Green Cleaning Experts', 'salary' => '230000'],
        ]);
    }
}
