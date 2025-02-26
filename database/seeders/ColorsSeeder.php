<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsSeeder extends Seeder
{
    public function run()
    {
        $colors = ['Red', 'Blue', 'Black', 'White', 'Green', 'Yellow', 'Gray'];

        foreach ($colors as $index => $color) {
            DB::table('colors')->insert([
                'id' => $index + 1,
                'name' => $color,
                'created_at' => now()
            ]);
        }
    }
}
