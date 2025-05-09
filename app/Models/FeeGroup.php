<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeGroup extends Model
{
    protected $table = 'fee_groups';
    protected $fillable = ['group', 'amount'];

}
