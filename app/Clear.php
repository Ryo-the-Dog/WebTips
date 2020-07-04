<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clear extends Model
{
    protected $fillable = [
        'article_id' , 'user_id'
    ];
}
