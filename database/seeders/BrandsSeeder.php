<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            ['id' => 1, 'name' => 'Toyota', 'founded_year' => 1937, 'country' => 'Japan'],
            ['id' => 2, 'name' => 'Ford', 'founded_year' => 1903, 'country' => 'USA'],
            ['id' => 3, 'name' => 'BMW', 'founded_year' => 1916, 'country' => 'Germany'],
        ];

        DB::table('brands')->insert($brands);
    }
}
