<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Departmen extends Model
{
    protected $table = 'departmens';
    protected $fillable = ['faculty_id','name', 'code', 'slug'];

    protected function code():Attribute
    {
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtoupper($value),
        );
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
