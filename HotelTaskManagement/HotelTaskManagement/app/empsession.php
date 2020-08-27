<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empsession extends Model
{
    protected $fillable = ['stime', 'etime', 'details','status', 'emp_id'];
}
