<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'user_id',
        'faculty_id',
        'departmen_id',
        'teacher_number',
        'academic_title',
    ];
}
