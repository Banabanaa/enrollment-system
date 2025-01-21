<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'last_name' => 'Test',
                'first_name' => 'CSDepartment',
                'middle_name' => 'One',
                'department_name' => 'Computer Science',
                'contact_number' => '09123456789',
                'email' => 'csdepartment@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'last_name' => 'Test',
                'first_name' => 'ITDepartment',
                'middle_name' => 'One',
                'department_name' => 'Information Technology',
                'contact_number' => '09123456789',
                'email' => 'itdepartment@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}