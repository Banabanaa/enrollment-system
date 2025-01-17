<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            ['course_code' => 'COSC85', 'course_title' => 'Networks And Communication', 'program_id' => "Bachelor of Science in Computer Science", 'credit_unit_lecture' => 2, 'credit_unit_laboratory' => 1, 'contact_hours_lecture' => 0, 'contact_hours_laboratory' => 0],
            ['course_code' => 'COSC101', 'course_title' => 'CS Elective 1(Computer Graphics and Visual Computing)', 'program_id' => "Bachelor of Science in Computer Science", 'credit_unit_lecture' => 2, 'credit_unit_laboratory' => 1, 'contact_hours_lecture' => 0, 'contact_hours_laboratory' => 0],
            ['course_code' => 'DCIT26', 'course_title' => 'Applications Devt And Emerging Technologies', 'program_id' => "Bachelor of Science in Computer Science", 'credit_unit_lecture' => 2, 'credit_unit_laboratory' => 1, 'contact_hours_lecture' => 0, 'contact_hours_laboratory' => 0],
            ['course_code' => 'DCIT65', 'course_title' => 'Social And Professional Issues)', 'program_id' => "Bachelor of Science in Computer Science", 'credit_unit_lecture' => 3, 'credit_unit_laboratory' => 0, 'contact_hours_lecture' => 0, 'contact_hours_laboratory' => 0],
            // Add more courses here
        ]);
    }
}
