<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses'; // Ensure this matches your actual table name
    protected $fillable = ['course_code', 'course_name']; // Example fields
}
