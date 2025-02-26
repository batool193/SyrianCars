<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            ColorsSeeder::class,
            BrandsSeeder::class,
            ModelsSeeder::class,
            CitiesSeeder::class,
            FuelsSeeder::class,
            CarsSeeder::class,
            RatingsSeeder::class,
            
            
        ]);
    }
}
