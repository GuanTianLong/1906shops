<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FindPassModel extends Model
{
    protected $table = 'p_findpass';
    protected $guarded = ['expire'];
}
