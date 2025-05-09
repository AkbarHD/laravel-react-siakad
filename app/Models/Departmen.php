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
}
