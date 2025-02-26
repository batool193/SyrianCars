namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'role_id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'city_id' => 1,
                'birthdate' => '1990-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
