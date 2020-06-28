<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
// マークダウン
use cebe\markdown\Markdown as Markdown;

class Step extends Model
{
    protected $table = 'steps';
    protected $fillable = ['user_id', 'title', 'category_ids[]', 'description','step_img'];
    // Userモデルに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // ChildStepモデルに対するリレーション
    public function childSteps()
    {
        return $this->hasMany('App\ChildStep');
    }
    // Categoryモデルに対するリレーション(互いに複数)
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    // Challengeモデルに対するリレーション
    public  function challenges() {
        return $this->hasMany('App\Challenge');
    }
    // AllClearモデルに対するリレーション
    public  function allClears() {
        return $this->hasMany('App\AllClear');
    }

    // STEPをカテゴリ別に表示するアクション
    public function getStepList(int $num_per_page = 20, array $condition = []) {
        // 引数として渡ってきたcategory_idだけ取り出す
        $category_id = Arr::get($condition, 'category_id');
        // 並び替えの指定
        $sort_id = Arr::get($condition, 'sort_id');

        // 並び替えの指定があった場合
        if($sort_id==='asc') {
            $query = $this->orderBy('updated_at','asc');
        }else{
            $query = $this->with('categories');
        }

        // カテゴリーテーブルから
        if ($category_id) {
            $query->whereHas('categories', function ($q) use ($category_id) {
                $q->where('id', $category_id);
            });
        }

        return $query->orderBy('updated_at','desc')->paginate($num_per_page);

    }


}
