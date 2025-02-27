<?php
namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        $colors = ['Red', 'Blue', 'Black', 'White', 'Green', 'Yellow', 'Gray'];

        foreach ($colors as  $color) {
           Color::create([
                'name' => $color,
                'created_at' => now()
            ]);
        }
    }
}
