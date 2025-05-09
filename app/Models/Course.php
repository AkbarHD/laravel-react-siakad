<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'code',
        'name',
        'credit',
        'semester',
        'faculty_id',
        'departmen_id',
        'teacher_id',
        'academic_year_id',
    ];
}
