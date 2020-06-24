<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllClear extends Model
{
    protected $table = 'allClears';

    protected $fillable = [
        'step_id' , 'user_id'
    ];
}
