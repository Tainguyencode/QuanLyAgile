<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       DB::table('users')->insert([
        [
            'name' => 'Anh Tuấn',
            'email' => 'tuấn@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'phone' => '0987654321',
            'password' => Hash::make('123456'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]
       ]);
    }
}
