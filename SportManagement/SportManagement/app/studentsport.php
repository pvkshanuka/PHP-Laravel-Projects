<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentsport extends Model
{
    protected $fillable = ['student_id','sport_id','leaderq', 'otherq', 'status'];
}
