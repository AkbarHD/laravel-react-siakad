<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';

    protected $fillable = [
        'student_id',
        'academic_year_id',
        'fee_group_id',
        'semester',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function feeGroup()
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
