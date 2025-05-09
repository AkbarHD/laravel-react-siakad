<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyResult extends Model
{
    protected $table = 'study_results';

    protected $fillable = [
        'student_id',
        'academic_year_id',
        'semester',
        'gpa',
    ];
}
