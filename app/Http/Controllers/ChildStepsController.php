<?php

namespace App\Http\Controllers;

use App\AllClear;
use App\Chapter;
use App\Clear;
use App\Article;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildStepsController extends Controller
{
    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Article $step, Chapter $childStep, Clear $clear) {
        $this->auth = $auth;
        $this->step = $step;
        $this->childStep = $childStep;
        $this->clear = $clear;
    }

    // ========================================
    // 子STEPの詳細を表示するアクション
    // ========================================
    public function show($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // クリックされた子STEPのidを格納
        $childStep = $this->childStep->find($id);

        // 登録されていない数字がURLに入力された場合はリダイレクト
        if(empty($childStep)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // 子STEPが属する親STEPのidを格納
        $stepId = $childStep->step_id;

        // 親STEPのデータを取得
        $step = $this->step->find($stepId);

        // 親STEPが持つ子STEPを全て格納する
        $childSteps = $step->childSteps;

        // 親STEPが持つ子STEPのidを格納する
        $childStepIds = getIds($childSteps);

        // このページの子STEPの数
        $childStepsCount = count($childSteps);

        // 子STEPのクリア数が０の時にエラーが出ないように定義しておく
        $thisClearChildStepsCount = 0;

        // ユーザーがログイン中の場合のみチャレンジとクリアの情報を渡す
        if(!empty($this->auth->user())) {

            $userAuth = $this->auth->user();

            // ログイン中のユーザーがこのSTEPにチャレンジ中であればtrueを格納する
            $defaultChallenged = ($step->challenges->where('user_id', $userAuth->id)->first()) ? true : false;

            // ログインユーザーの子STEPのクリア状況
            $myClearChildSteps = $this->clear->all()->where('user_id', $userAuth->id);

            // ログインユーザーがクリアした子STEPの中から、このページのクリアした子STEPを取得する
            foreach ($childStepIds as $childStepId){
                if(!$myClearChildSteps->where('child_step_id', $childStepId)->isEmpty()){
                    $thisClearChildSteps[] = $myClearChildSteps->where('child_step_id', $childStepId);
                }
            }

            // クリアしたSTEPがある場合
            if(!empty($thisClearChildSteps)) {

                // クリアしたSTEPの数
                $thisClearChildStepsCount = $thisClearChildSteps ? count($thisClearChildSteps) : 0;

                // 全てのSTEPをクリアしている場合
                if($step->allClears->where('user_id', $userAuth->id)->first()) {

                    $allClearFlg = true;

                    return view('articles.childStep',
                        compact('step','childStep', 'childStepIds', 'childStepsCount', 'defaultChallenged', 'myClearChildSteps',  'thisClearChildStepsCount', 'allClearFlg'));
                }else{
                    // クリアしたSTEPはあるが全てはクリアしていない場合
                    return view('articles.childStep', compact('step','childStep', 'childStepIds', 'childStepsCount', 'defaultChallenged', 'myClearChildSteps', 'thisClearChildStepsCount'));
                }
            }else{
                // クリアしたSTEPが無い場合
                return view('articles.childStep',compact('step','childStep', 'childStepIds', 'childStepsCount', 'defaultChallenged', 'thisClearChildStepsCount'));
            }
        }else{
            // ユーザーがログインしていない場合
            return view('articles.childStep', compact('step','childStep'));
        }
    }
}
