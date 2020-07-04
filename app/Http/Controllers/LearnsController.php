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
    // チャレンジを開始するアクション
    // ========================================
    public function learn(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // DBに保存するために記事のidを格納
        $articleId = $this->article->find($id)->id;

        // DBに保存するためにユーザーのidを格納
        $userId = $this->auth->user()->id;

        // challengesテーブルにuserIdとarticleIdを保存する
        $challenge = $this->learn->create([
            'user_id' => $userId,
            'article_id' => $articleId,
        ]);

        return redirect()->route('articles.show', ['id' => $articleId])->with('flash_message',__('Added to List.'));
    }

    // ========================================
    // チャレンジを中断するアクション
    // ========================================
    public function unlearn(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // DBで検索するために記事のidを格納
        $articleId = $this->article->find($id)->id;

        // DBで検索するためにユーザーのidを格納
        $userId = $this->auth->user()->id;

        // learnsテーブルから指定の記事を削除する
        $learn = $this->learn->where('user_id', $userId)->where('article_id', $articleId)->delete();

        return redirect()->route('articles.show', ['id' => $articleId])->with('flash_message',__('Removed from List.'));

    }
}
