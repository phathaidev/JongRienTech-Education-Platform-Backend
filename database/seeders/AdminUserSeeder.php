<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check for existing ADMIN_EMAIL and ADMIN_PASSWORD from .env first
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');
        if (blank($adminEmail)) {
            throw new \RuntimeException('Admin Email is not being set in .env file');
        }
        if (blank($adminPassword)) {
            throw new \RuntimeException('Admin Password is not being set in .env file');
        }

        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'verified' => true,
                'profile_picture' => 'default.png',
            ]
        );
    }
}
