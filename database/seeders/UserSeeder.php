<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'phone' => '1234567890',
                'city_id' => 1,
                'birthdate' => '1990-01-01',
                'created_at' => now(),
                'updated_at' => now(),
        ]);

        $admin->assignRole('admin');

    }
}
