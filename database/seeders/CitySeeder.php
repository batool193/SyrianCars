<?php
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = ['Homs', 'Hama', 'Aleppo', 'Idlib', 'Daraa'];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
            ]);
        }
    }
}
