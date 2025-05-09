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
}
