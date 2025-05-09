<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = [
        'student_id',
        'course_id',
        'classroom_id',
        'grade',
        'section',
        'category',
    ];
}
