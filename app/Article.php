<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
// マークダウン
use cebe\markdown\Markdown as Markdown;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['user_id', 'title', 'category_ids[]', 'description','article_img'];
    // Userモデルに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // Chapterモデルに対するリレーション
    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }
    // Categoryモデルに対するリレーション(互いに複数)
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    // Learnモデルに対するリレーション
    public  function learns() {
        return $this->hasMany('App\Learn');
    }
    // Clearモデルに対するリレーション
    public  function clears() {
        return $this->hasMany('App\Clear');
    }
    // AllClearモデルに対するリレーション
//    public  function allClears() {
//        return $this->hasMany('App\AllClear');
//    }

    // 記事をカテゴリ別に表示するアクション
    public function getArticleList(int $num_per_page = 20, array $condition = []) {
        // 引数として渡ってきたcategory_idだけ取り出す
        $category_id = Arr::get($condition, 'category_id');
        // 並び替えの指定
        $sort_id = Arr::get($condition, 'sort_id');

        // 並び替えの指定があった場合
        if($sort_id === 'popular') {

            $query = $this->withCount('learns')->orderBy('learns_count','desc');

        }elseif($sort_id === 'asc') {

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
