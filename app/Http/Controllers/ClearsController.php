<?php

namespace App\Http\Controllers;

use App\AllClear;
use App\Chapter;
use App\Clear;
use App\Article;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearsController extends Controller
{
    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Clear $clear, AllClear $allClear, Chapter $chapter, Article $article) {
        $this->auth = $auth;
        $this->clear = $clear;
        $this->chapter = $chapter;
        $this->article = $article;
    }

    // ========================================
    // 記事を学習済みにするアクション
    // ========================================
    public function clear($id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // ユーザーのidを格納
        $userId = $this->auth->user()->id;

        // clearsテーブルにuser_idとarticle_idを保存する
        if(!$this->clear->where('article_id', $id)->where('user_id', $userId)->first()) {
            $clear = $this->clear->create([
                'article_id' => $id,
                'user_id' => $userId,
            ]);
        }

        $clearCount = count(Clear::where('article_id', $id)->get());

//        return redirect()->route('articles.show', ['id' => $id])->with('flash_message', __('Clear this Lesson.'));

        return response()->json();
    }

    // ========================================
    // 学習済みをキャンセルするアクション
    // ========================================
    public function unclear($id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        $this->clear->where('user_id', $this->auth->user()->id)->where('article_id', $id)->delete();


//        return redirect()->route('articles.show', $id)->with('flash_message',__('Clear Canceled.'));
        return response()->json();
    }
}
