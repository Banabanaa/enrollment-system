<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advising extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number', 'first_name', 'middle_name', 'last_name', 'advised_courses', 'advising_notes', 
        'department_first_name', 'department_last_name'
    ];

    protected $casts = [
        'advised_courses' => 'array', // Ensures courses are stored as an array
    ];
}
