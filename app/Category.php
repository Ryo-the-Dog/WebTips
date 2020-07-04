<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // stepsテーブルに対するリレーション(互いに複数)
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
    // カテゴリー一覧を取得
    public function getCategoryList(int $num_per_page = 0)
    {
        $query = $this;
        if ($num_per_page) {
            return $query->paginate($num_per_page);
        }
        return $query->get();
    }
}
