<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'barangay',
        'city',
        'province',
        'zip_code',
    ];

    /**
     * Get the students that belong to the address.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'address_id');  // One-to-many relationship
    }
}
