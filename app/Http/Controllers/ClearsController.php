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
//        $this->allClear = $allClear;
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

        // clearsテーブルにuser_idとarticle_idを保存する
        $clear = $this->clear->create([
            'user_id' => $this->auth->user()->id,
            'article_id' => $id
        ]);

        return redirect()->route('articles.show', ['id' => $id])->with('flash_message', __('Clear this Lesson.'));

        // クリアが押された子STEPを格納する
//        $targetChildStep = $this->childStep->find($id);

        // クリアが押された子STEPの親STEPのidを格納する
//        $parentStepId = $targetChildStep->step_id;

        // クリアが押された子STEPの親STEPを格納する
//        $parentStep = $this->step->find($parentStepId);

        // 親STEPが持つ子STEPを全て格納する
//        $childSteps = $parentStep->childSteps;

        // 親STEPが持つ子STEPのidを格納する
//        $childStepIds = getIds($childSteps);

        // このページのチャプターの数
//        $chapter = count($chapter);

        // 子STEPのクリア数が０の時にエラーが出ないように定義しておく
//        $thisClearChildStepsCount = 0;

        // ログインユーザーの子STEPのクリア状況
//        $myClearChildSteps = $this->clear->all()->where('user_id', $this->auth->user()->id);

        // ログインユーザーがクリアした子STEPの中から、このページのクリアした子STEPを取得する
//        foreach ($childStepIds as $childStepId){
//            if(!$myClearChildSteps->where('child_step_id', $childStepId)->isEmpty()){
//                $thisClearChildSteps[] = $myClearChildSteps->where('child_step_id', $childStepId);
//            }
//        }

//        if (!empty($thisClearChildSteps)) {
//            // クリアしたSTEPの数
//            $thisClearChildStepsCount = $thisClearChildSteps ? count($thisClearChildSteps) : 0;
//
//            // 全てのSTEPをクリアしている場合
//            if ($childStepsCount === $thisClearChildStepsCount) {
//
//                // allClearsテーブルにSTEPの情報を追加する
//                if (empty($this->allClear->where(['user_id' => $this->auth->user()->id, 'step_id' => $parentStepId])->first())) {
//
//                    $this->allClear->create([
//                        'user_id' => $this->auth->user()->id,
//                        'step_id' => $parentStepId
//                    ]);
//
//                    return redirect()->route('articles.show', ['id' => $parentStepId])->with('flash_message',nl2br(__('CONGRATULATIONS!All STEPS CLEARED!'), false));
//                }
//            }
//        }
//        return redirect()->route('articles.show', ['id' => $parentStepId])->with('flash_message', __('Clear! Go Next STEP!'));
    }

    // ========================================
    // クリア状況をキャンセルするアクション
    // ========================================
    public function unclear($id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // 記事のid
//        $articleId = $id;

        // このページのチャプターを全て格納する
//        $thisChildSteps = $this->childStep->where('step_id', $id)->get();

        // ログインユーザーがクリアした子STEP
//        $myClearChildSteps = $this->clear->all()->where('user_id', $this->auth->user()->id);

        // このページのクリアした子STEP
//        foreach ($thisChildSteps as $thisChildStep){
//            if(!$myClearChildSteps->where('child_step_id', $thisChildStep->id)->isEmpty()){
//                $thisClearChildSteps[] = $myClearChildSteps->where('child_step_id', $thisChildStep->id);
//            }
//        }

        $this->clear->where('user_id', $this->auth->user()->id)->where('article_id', $id)->delete();

        // このページのクリアした子STEPのid
//        if(!empty($thisClearChildSteps)){
//            foreach ($thisClearChildSteps as $key){
//                foreach($key as $thisClearChildStep){
//                    $thisClearChildStepIds[] = $thisClearChildStep->child_step_id;
//                }
//            }
//
//            // ログインユーザーのクリア情報を削除する
//            foreach ($thisClearChildStepIds as $id){
//                $this->clear->where('user_id', $this->auth->user()->id)->where('child_step_id', $id)->delete();
//            }
//
//            // 全てクリアしていた場合もその情報を削除する
//            $this->allClear->where('user_id', $this->auth->user()->id)->where('step_id', $stepId)->delete();
//        }
        return redirect()->route('articles.show', $id)->with('flash_message',__('Clear Canceled.'));
    }
}
