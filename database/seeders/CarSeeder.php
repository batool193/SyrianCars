<?php
namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        Car::create([
            'user_id'=>1,
                'brand_id' => 1,
                'model_id' => 1,
                'color_id' => 1,
                'gear_id'=>1,
                'city_id' => 1,
                'production_year' => 2005,
                'engine_power' => 130,
                'fuel_id' => 1,
                'condition' => 'used',
                'mileage' => 50000,
                'price' => 15000.00,
                'description' => 'Well-maintained Toyota Corolla.',
                'plate_number' => 'ABC-111',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Car::create([
            'user_id'=>1,
                'brand_id' => 2,
                'model_id' => 2,
                'color_id' => 2,
                'gear_id'=>1,
                'city_id' => 2,
                'production_year' => 1999,
                'engine_power' => 130,
                'fuel_id' => 1,
                'condition' => 'new',
                'mileage' => 50000,
                'price' => 30000.00,
                'description' => 'Well-maintained Toyota Corolla.',
                'plate_number' => 'ABC-112',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
        ]);

        Car::create([
            'user_id'=>1,
                'brand_id' => 3,
                'model_id' => 3,
                'color_id' => 3,
                'gear_id'=>2,
                'city_id' => 2,
                'production_year' => 2010,
                'engine_power' => 1389,
                'fuel_id' => 1,
                'condition' => 'used',
                'mileage' => 50000,
                'price' => 35000.00,
                'description' => 'Well-maintained Toyota Corolla.',
                'plate_number' => 'ABC-113',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
        ]);
    }
}
