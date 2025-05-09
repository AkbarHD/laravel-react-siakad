<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = ['name', 'slug', 'faculty_id', 'departmen_id', 'academic_year_id'];
}
