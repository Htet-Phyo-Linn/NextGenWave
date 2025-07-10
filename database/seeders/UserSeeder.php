<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default admin
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'phone'    => '09123456789',
            'role'     => 'admin',
            'password' => Hash::make('password'),
        ]);

        // Generate 14 random users
        for ($i = 1; $i <= 14; $i++) {
            User::create([
                'name'              => "User $i",
                'email'             => "user$i@example.com",
                'phone'             => '09' . rand(100000000, 999999999),
                'role'              => ['user', 'student', 'instructor'][rand(0, 2)],
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
            ]);
        }
    }
}
