<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'username' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'created_at' => now(),
                'role' => 'admin',
            ]
        );
    }
}
