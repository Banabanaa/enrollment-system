<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Specify the table associated with the model
    protected $table = 'students'; 

    // Set the primary key field to student_id
    protected $primaryKey = 'student_id'; 

    // Specify if the primary key is not an incrementing integer
    public $incrementing = false; // Set to true if student_id is an auto-incrementing integer
    
    // Specify the key type - use int if student_id is an integer type
    protected $keyType = 'int'; // or 'string' if it's a string

    // Other model properties
    protected $fillable = ['student_id', 'name', 'email']; // adjust as needed
}
