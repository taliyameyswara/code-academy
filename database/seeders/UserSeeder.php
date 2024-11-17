<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Admin User
         User::create([
            'name' => 'Admin User',
            'email' => 'admin@codeacademy.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Regular User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@codeacademy.com',
            'phone_number' => '088238742482',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
