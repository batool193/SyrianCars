<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsSeeder extends Seeder
{
    public function run()
    {
        DB::table('models')->insert([
            ['id' => 1, 'brand_id' => 1, 'name' => 'Corolla'],
            ['id' => 2, 'brand_id' => 1, 'name' => 'Camry'],
            ['id' => 3, 'brand_id' => 2, 'name' => 'Mustang'],
            ['id' => 4, 'brand_id' => 3, 'name' => 'X5'],
        ]);
    }
}
