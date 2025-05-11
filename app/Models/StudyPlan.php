<?php

namespace App\Models;

use App\Enums\StudyPlanStatus;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    // krs
    protected $table = 'study_plans';

    protected $fillable = [
        'student_id',
        'academic_year_id',
        'status',
        'notes',
        'semester',
    ];

    protected function casts(): array
    {
        return [
            'status' => StudyPlanStatus::class,
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'study_plan_schedules', 'study_plan_id', 'schedule_id')->withTimestamps();
    }
}
