<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrars')->insert([
            [
                'last_name' => 'Test',
                'first_name' => 'Registrar',
                'middle_name' => 'One',
                'contact_number' => '09123456789',
                'email' => 'registrar@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Hash the password
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}