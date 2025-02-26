namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionYearsSeeder extends Seeder
{
    public function run()
    {
        for ($year = 1990; $year <= 2025; $year++) {
            DB::table('production_years')->insert([
                'id' => $year - 1989,
                'year' => $year
            ]);
        }
    }
}
