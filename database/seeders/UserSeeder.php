<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => '{ JEBC-DEV }',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        // User
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);

        // Guest
        User::create([
            'name' => 'guest',
            'email' => 'guest@guest.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password'),
        ]);
    }
}
