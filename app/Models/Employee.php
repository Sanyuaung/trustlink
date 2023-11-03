<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'father_name', 'email', 'apply_position', 'nrc', 'day_of_birth',
        'address', 'phone', 'image', 'gender', 'nationality', 'religion', 'marital_status', 'spouse_name',
        'expected_salary', 'other_qualification'
    ];

    public function workingExperiences()
    {
        return $this->hasMany(WorkingExperience::class);
    }
}