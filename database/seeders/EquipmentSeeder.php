<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipments')->insert([
            [
                'equipment_name' => 'Microfiber cloths',
                'maintenance_date' => Carbon::create('2024', '12', '04'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Broom',
                'maintenance_date' => Carbon::create('2024', '09', '15'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Dustpan',
                'maintenance_date' => Carbon::create('2024', '10', '22'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Mop',
                'maintenance_date' => Carbon::create('2024', '08', '10'),
                'equipment_category' => 'tools',
                'condition_status' => 'need to repair'
            ],
            [
                'equipment_name' => 'Vacuum cleaner',
                'maintenance_date' => Carbon::create('2024', '11', '05'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Washing machine',
                'maintenance_date' => Carbon::create('2024', '06', '18'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Dryer',
                'maintenance_date' => Carbon::create('2024', '04', '25'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Iron',
                'maintenance_date' => Carbon::create('2024', '07', '09'),
                'equipment_category' => 'machines',
                'condition_status' => 'need to repair'
            ],
            [
                'equipment_name' => 'Squeegee',
                'maintenance_date' => Carbon::create('2024', '12', '01'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Telescopic poles',
                'maintenance_date' => Carbon::create('2024', '03', '14'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Scrubbing brushes',
                'maintenance_date' => Carbon::create('2024', '02', '20'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Stain-removal tools',
                'maintenance_date' => Carbon::create('2024', '10', '02'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Carpet shampooer',
                'maintenance_date' => Carbon::create('2024', '11', '14'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Coil brush',
                'maintenance_date' => Carbon::create('2024', '07', '12'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Fin comb',
                'maintenance_date' => Carbon::create('2024', '05', '29'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Steam cleaner',
                'maintenance_date' => Carbon::create('2024', '08', '15'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Pruning shears',
                'maintenance_date' => Carbon::create('2024', '06', '10'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Lawn mower',
                'maintenance_date' => Carbon::create('2024', '09', '05'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Clothes hangers',
                'maintenance_date' => Carbon::create('2024', '08', '19'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Ironing board',
                'maintenance_date' => Carbon::create('2024', '07', '01'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Iron',
                'maintenance_date' => Carbon::create('2024', '11', '10'),
                'equipment_category' => 'machines',
                'condition_status' => 'need to repair'
            ],
            [
                'equipment_name' => 'Scrub brushes',
                'maintenance_date' => Carbon::create('2024', '04', '20'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Grout brush',
                'maintenance_date' => Carbon::create('2024', '05', '17'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Polishing pads',
                'maintenance_date' => Carbon::create('2024', '06', '05'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Floor polisher',
                'maintenance_date' => Carbon::create('2024', '03', '30'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Step ladder',
                'maintenance_date' => Carbon::create('2024', '09', '28'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Glass cleaner',
                'maintenance_date' => Carbon::create('2024', '10', '04'),
                'equipment_category' => 'chemicals',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Biohazard disposal bags',
                'maintenance_date' => Carbon::create('2024', '11', '21'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Protective clothing',
                'maintenance_date' => Carbon::create('2024', '07', '27'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Mold cleaning solutions',
                'maintenance_date' => Carbon::create('2024', '06', '18'),
                'equipment_category' => 'chemicals',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Air duct brushes',
                'maintenance_date' => Carbon::create('2024', '04', '01'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Compressed air systems',
                'maintenance_date' => Carbon::create('2024', '02', '14'),
                'equipment_category' => 'machines',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Disinfectant sprays',
                'maintenance_date' => Carbon::create('2024', '12', '01'),
                'equipment_category' => 'chemicals',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Cleaning cloths',
                'maintenance_date' => Carbon::create('2024', '11', '23'),
                'equipment_category' => 'tools',
                'condition_status' => 'good'
            ],
            [
                'equipment_name' => 'Surface cleaner',
                'maintenance_date' => Carbon::create('2024', '08', '12'),
                'equipment_category' => 'chemicals',
                'condition_status' => 'good'
            ]
        ]);
    }   
}
