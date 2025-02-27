<?php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
      Brand::create( [
             'name' => 'BMW', 'founded_year' => 2025, 'country' => 'Germany'
        ]);
        Brand::create( [
             'name' => 'Ford', 'founded_year' => 2015, 'country' => 'USA'
        ]);
        Brand::create( [
             'name' => 'Toyota', 'founded_year' => 2024, 'country' => 'Japan'
        ]);

    }
}
