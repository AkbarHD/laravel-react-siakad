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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function feeGroup()
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function departmen()
    {
        return $this->belongsTo(Departmen::class, 'departmen_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function studyResults()
    {
        return $this->hasMany(StudyResult::class);
    }
}
