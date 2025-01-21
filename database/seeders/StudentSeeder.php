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
                'student_number' => 'CS-20230001',
                'last_name' => 'Manila',
                'first_name' => 'Aaron',
                'middle_name' => 'A.',
                'extension_name' => null,
                'contact_number' => '09123456789',
                'email' => 'aaron@email.com',
                'password' => Hash::make('123'),
                'birthday' => '2000-01-15',
                'sex' => 'male',
                'classification' => 'regular',
                'program_id' => 'Bachelor of Science in Computer Science',
                'year' => '3rd Year',
                'section' => 'A',
                'house_number' => '123',
                'street' => 'Main Street',
                'barangay' => 'Barangay Uno',
                'city' => 'Metro City',
                'province' => 'Metro Province',
                'zip_code' => '1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_number' => 'IT-20230002',
                'last_name' => 'Aurin',
                'first_name' => 'Linus',
                'middle_name' => 'B.',
                'extension_name' => null,
                'contact_number' => '09234567890',
                'email' => 'linus@email.com',
                'password' => Hash::make('password456'),
                'birthday' => '2001-03-22',
                'sex' => 'female',
                'classification' => 'irregular',
                'program_id' => 'Bachelor of Science in Information Technology',
                'year' => '2nd Year',
                'section' => 'B',
                'house_number' => '456',
                'street' => 'Second Street',
                'barangay' => 'Barangay Dos',
                'city' => 'Metro City',
                'province' => 'Metro Province',
                'zip_code' => '5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
