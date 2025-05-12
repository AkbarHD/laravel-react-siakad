<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeGroup extends Model
{
    // untuk memanggil factory
    use HasFactory;
    protected $table = 'fee_groups';
    protected $fillable = ['group', 'amount'];

}
