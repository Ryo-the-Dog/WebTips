<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    protected $fillable = [
        'child_step_id' , 'user_id'
    ];
}
