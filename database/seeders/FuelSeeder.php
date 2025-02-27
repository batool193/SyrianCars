<?php
namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Seeder;

class FuelSeeder extends Seeder
{
    public function run()
    {
        $fuels = ['petrol', 'diesel', 'electric', 'hybrid'];

        foreach ($fuels as $fuel) {
            Fuel::create([
                'fuel_type' => $fuel,
                'created_at' => now()
            ]);
        }
    }
}
