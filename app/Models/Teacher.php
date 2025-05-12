<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'user_id',
        'faculty_id',
        'departmen_id',
        'teacher_number',
        'academic_title',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function departmen()
    {
        return $this->belongsTo(Departmen::class, 'departmen_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
