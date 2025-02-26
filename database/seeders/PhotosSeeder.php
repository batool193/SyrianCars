<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosSeeder extends Seeder
{
    public function run()
    {
        DB::table('photos')->insert([
            [
                'id' => 1,
                'photoable_type' => 'car',
                'photoable_id' => 1,
                'url' => 'https://example.com/car1.jpg',
                'name' => 'car_photo.jpg',
                'created_at' => now(),
            ],
        ]);
    }
}
