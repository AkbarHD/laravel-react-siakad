<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = ['name', 'slug', 'faculty_id', 'departmen_id', 'academic_year_id'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function departmen()
    {
        return $this->belongsTo(Departmen::class, 'departmen_id');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(
            Course::class,
            Schedule::class,
            'classroom_id', // foreign di tabe schedule
            'id', // foreign di table course
            'id', // foreign di table classroom
            'course_id' // foreign di table schedule
        );
    }
}
