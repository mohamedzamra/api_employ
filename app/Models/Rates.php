<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $fillable=[
        'employee_rater_id',' employee_rated_id','rate','date'
    ];
}
