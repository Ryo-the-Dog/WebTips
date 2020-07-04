<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $fillable = ['article_id', 'chapter_number', 'chapter[]', 'title', 'content'];

    // Articleモデルに対するリレーション
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
    // Clearモデルに対するリレーション
    public  function clears() {
        return $this->hasMany('App\Clear');
    }
}
