<?php

namespace App\Models;

use App\Enums\StudyPlanStatus;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
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
}
