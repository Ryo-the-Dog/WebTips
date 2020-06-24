<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Step;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengesController extends Controller
{
    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Challenge $challenge, Step $step) {
        $this->auth = $auth;
        $this->challenge = $challenge;
        $this->step = $step;
    }

    // ========================================
    // チャレンジを開始するアクション
    // ========================================
    public function challenge(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // DBに保存するためにSTEPのidを格納
        $stepId = $this->step->find($id)->id;

        // DBに保存するためにユーザーのidを格納
        $userId = $this->auth->user()->id;

        // challengesテーブルにuserIdとstepIdを保存する
        $challenge = $this->challenge->create([
            'user_id' => $userId,
            'step_id' => $stepId,
        ]);

        return redirect()->route('steps.show', ['id' => $stepId])->with('flash_message',__('Challenge Start!'));
    }

    // ========================================
    // チャレンジを中断するアクション
    // ========================================
    public function unchallenge(Request $request, $id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // DBで検索するためにSTEPのidを格納
        $stepId = $this->step->find($id)->id;

        // DBで検索するためにユーザーのidを格納
        $userId = $this->auth->user()->id;

        // challengesテーブルから指定のSTEPを削除する
        $challenge = $this->challenge->where('user_id', $userId)->where('step_id', $stepId)->delete();

        return redirect()->route('steps.show', ['id' => $stepId])->with('flash_message',__('Challenge Canceled.'));

    }
}
