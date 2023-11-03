<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingExperience extends Model
{
    protected $fillable = [
        'employee_id', 'company_name', 'job_title', 'start_date', 'end_date', 'department', 'project_link'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}