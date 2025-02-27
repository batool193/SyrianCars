<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            ColorSeeder::class,
            BrandSeeder::class,
            CarModelSeeder::class,
            FuelSeeder::class,
            GearSeeder::class,
            CarSeeder::class,
            RatingSeeder::class,


        ]);
    }
}
