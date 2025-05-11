<?php

namespace App\Models;

use App\Enums\ScheduleDay;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'faculty_id',
        'departmen_id',
        'course_id',
        'classroom_id',
        'academic_year_id',
        'start_time',
        'end_time',
        'day_of_week',
        'quote',
    ];

    protected function casts(): array
    {
        return [
            'day_of_week' => ScheduleDay::class,
        ];
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function departmen()
    {
        return $this->belongsTo(Departmen::class, 'departmen_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    // krs
    public function studyPlan()
    {
        return $this->belongsToMany(StudyPlan::class, 'study_plan_schedules', 'schedule_id', 'study_plan_id')->withTimestamps();
    }
}
