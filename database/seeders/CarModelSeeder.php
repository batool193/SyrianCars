<?php
namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarModelSeeder extends Seeder
{
    public function run()
    {
        CarModel::create([
             'brand_id' => 1, 'name' => 'Corolla'
        ]);
        CarModel::create([
            'brand_id' => 1, 'name' => 'Camry'
        ]);
        CarModel::create([
            'brand_id' => 2, 'name' => 'Mustang'
        ]);
        CarModel::create([
             'brand_id' => 3, 'name' => 'X5'
        ]);
    }
}
