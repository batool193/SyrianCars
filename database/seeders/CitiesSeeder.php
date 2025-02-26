namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    public function run()
    {
        $cities = ['Homs', 'Hama', 'Aleppo', 'Idlib', 'Daraa'];

        foreach ($cities as $index => $city) {
            DB::table('cities')->insert([
                'id' => $index + 1,
                'name' => $city,
            ]);
        }
    }
}
