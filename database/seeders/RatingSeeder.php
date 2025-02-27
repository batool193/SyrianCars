<?php
namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    public function run()
    {
        Rating::create([
                'user_id' => 1,
                'car_id' => 1,
                'rate' => 8,
                'review' => 'Great car, very smooth drive!',
                'created_at' => now(),
        ]);
    }
}
