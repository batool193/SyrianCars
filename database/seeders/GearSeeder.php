<?php
namespace Database\Seeders;

use App\Models\Gear;
use Illuminate\Database\Seeder;

class GearSeeder extends Seeder
{
    public function run()
    {
        $gears = ['manual', 'automatic'];

        foreach ($gears as $gear) {
            Gear::create([
                'gear_type' => $gear,
                'created_at' => now()
            ]);
        }
    }
}
