<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = ['date', 'venue', 'status', 'emp_id'];
}
