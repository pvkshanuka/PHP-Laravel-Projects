<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $fillable = ['date','stime','etime','year','remarks','status','class_id', 'subject_id','examtype_id', 'periodtime_id'];
}
