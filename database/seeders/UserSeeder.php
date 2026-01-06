<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Password admin
            'role' => 'admin',
        ]);

        // 2. Akun Petani
        User::create([
            'name' => 'Pak Tani',
            'email' => 'petani@gmail.com',
            'password' => Hash::make('petani123'), // Password petani
            'role' => 'petani',
        ]);
    }
}
