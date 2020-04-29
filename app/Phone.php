<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    protected $fillable = ['user_id','phone'];
    // use SoftDeletes;
}
