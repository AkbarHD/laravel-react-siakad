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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function departmen()
    {
        return $this->belongsTo(Departmen::class, 'departmen_id');
    }

}
