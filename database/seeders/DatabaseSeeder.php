<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user or update if the email already exists
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'), // Hash the password properly
            ]
        );

        // Call other seeders
        $this->call([
            CourseSeeder::class, // Ensure this seeder is correctly named and exists
            AdminSeeder::class,
            RegistrarSeeder::class,
            DepartmentSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
