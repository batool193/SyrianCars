namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialAccountsSeeder extends Seeder
{
    public function run()
    {
        DB::table('social_accounts')->insert([
            [
                'provider_name' => 'google',
                'provider_id' => '1234567890',
                'user_id' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
