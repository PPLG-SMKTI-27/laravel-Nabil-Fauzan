<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::updateOrCreate([
            'email' => 'admin@ojan.test',
        ], [
            'name' => 'Admin Ojan',
            'email' => 'admin@ojan.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->call(ProjectSeeder::class);
    }
}
