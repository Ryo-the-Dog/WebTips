<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildStep extends Model
{
    protected $table = 'childSteps';
    protected $fillable = ['step_id', 'step_number', 'child_step[]', 'title', 'content', 'time'];

    // Stepモデルに対するリレーション
    public function step()
    {
        return $this->belongsTo('App\Step');
    }
    // Clearモデルに対するリレーション
    public  function clears() {
        return $this->hasMany('App\Clear');
    }
}
