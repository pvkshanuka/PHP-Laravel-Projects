<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    protected $fillable = ['class_id', 'subject_id', 'periodtime_id','day'];
}
