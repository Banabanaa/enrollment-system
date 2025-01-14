<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'student_number' => '202410001',
                'last_name' => 'Manila',
                'first_name' => 'Aaron',
                'middle_name' => 'Pun-an',
                'extension_name' => null,
                'contact_number' => '09123456789',
                'email' => 'student@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'birthday' => '2004-05-15',
                'sex' => 'male',
                'classification' => 'regular',
                'program_id' => 'Computer Science',
                'year' => '3',
                'section' => 'B',
                'house_number' => '123',
                'street' => 'Main Street',
                'barangay' => 'San Juan',
                'city' => 'Quezon City',
                'province' => 'Metro Manila',
                'zip_code' => '1100',
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
