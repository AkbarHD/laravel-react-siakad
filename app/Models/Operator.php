<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operators';

    protected $fillable = [
        'user_id',
        'faculty_id',
        'departmen_id',
        'employee_number',
    ];
}
