namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('ratings')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'car_id' => 1,
                'rate' => 8,
                'review' => 'Great car, very smooth drive!',
                'created_at' => now(),
            ],
        ]);
    }
}
