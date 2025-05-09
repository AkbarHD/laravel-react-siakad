<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'faculty_id',
        'departmen_id',
        'classroom_id',
        'student_number',
        'semester',
        'batch',
        'fee_group_id',
    ];
}
