namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelsSeeder extends Seeder
{
    public function run()
    {
        $fuels = ['petrol', 'diesel', 'electric', 'hybrid'];

        foreach ($fuels as $index => $fuel) {
            DB::table('fuels')->insert([
                'id' => $index + 1,
                'fuel_type' => $fuel,
                'created_at' => now()
            ]);
        }
    }
}
