<?php

namespace App\Http\Controllers;

use App\Learn;
use App\Article;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnsController extends Controller
{
    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Learn $learn, Article $article) {
        $this->auth = $auth;
        $this->learn = $learn;
        $this->article = $article;
    }

    // ========================================
    // 学習リストに追加するアクション
    // ========================================
    public function learn(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // ユーザーのidを格納
        $userId = $this->auth->user()->id;

//        dd($this->learns->where('article_id', $id)->where('user_id', $userId)->get());

        // learnsテーブルにuserIdとarticleIdを保存する
        if(!$this->learn->where('article_id', $id)->where('user_id', $userId)->first()){
            $learn = $this->learn->create([
                'user_id' => $userId,
                'article_id' => $id,
            ]);
        }

        $learnCount = count(Learn::where('article_id', $id)->get());

//        return redirect()->route('articles.show', ['id' => $id])->with('flash_message',__('Added to List.'));
        return response()->json(['learnCount' => $learnCount]);
    }

    // ========================================
    // チャレンジを中断するアクション
    // ========================================
    public function unlearn(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // DBで検索するためにユーザーのidを格納
        $userId = $this->auth->user()->id;

        // learnsテーブルから指定の記事を削除する
        $learn = $this->learn->where('user_id', $userId)->where('article_id', $id)->delete();

        $learnCount = count(Learn::where('article_id', $id)->get());

//        return redirect()->route('articles.show', ['id' => $id])->with('flash_message',__('Removed from List.'));
        return response()->json(['learnCount' => $learnCount]);
    }
}
