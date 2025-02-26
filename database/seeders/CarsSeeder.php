<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'model_id' => 1,
                'color_id' => 1,
                'city_id' => 1,
                'production_year_id' => 30,
                'engine_power' => 130,
                'fuel_id' => 1,
                'condition' => 'used',
                'mileage' => 50000,
                'price' => 15000.00,
                'description' => 'Well-maintained Toyota Corolla.',
                'plate_number' => 'ABC-123',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
