<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses'; // Ensure this matches your database table
    protected $fillable = ['course_code', 'course_title', 'program_id','credit_unit_lecture','credit_unit_laboratory','contact_hours_lecture','contact_hours_laboratory','pre_requisite']; // Include all necessary fields
}
