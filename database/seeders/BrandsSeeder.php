<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            ['id' => 1, 'name' => 'Toyota', 'founded_year' => 2024, 'country' => 'Japan'],
            ['id' => 2, 'name' => 'Ford', 'founded_year' => 2015, 'country' => 'USA'],
            ['id' => 3, 'name' => 'BMW', 'founded_year' => 2025, 'country' => 'Germany'],
        ];

        DB::table('brands')->insert($brands);
    }
}
