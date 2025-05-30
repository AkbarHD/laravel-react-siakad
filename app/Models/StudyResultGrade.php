<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyResultGrade extends Model
{
    protected $table = 'study_result_grades';
    protected $fillable = [
        'study_result_id',
        'course_id',
        'letter',
        'weight_of_value',
        'grade',
    ];

    public function studyResult()
    {
        return $this->belongsTo(StudyResult::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
