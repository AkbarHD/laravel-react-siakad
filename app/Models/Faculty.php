<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';
    protected $fillable = ['name', 'code', 'logo', 'slug'];

    protected function code(): Attribute
    {
        return Attribute::make(
            // fungsinya untuk mengubah data menjadi huruf besar ketika diambil
            get: fn($value) => strtoupper($value),
            // fungsinya untuk mengubah data menjadi huruf kecil ketika diset
            set: fn($value) => strtoupper($value),
        );
    }

    public function departmens()
    {
        return $this->hasMany(Departmen::class);
    }
}
