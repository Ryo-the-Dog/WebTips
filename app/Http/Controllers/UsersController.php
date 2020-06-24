<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PassEditRequest;
use App\Step;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JD\Cloudder\Facades\Cloudder;

class UsersController extends Controller
{
    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, User $user, Category $category, Step $step) {
        $this->auth = $auth;
        $this->user = $user;
        $this->category = $category;
        $this->step = $step;
    }

    // ========================================
    // ユーザープロフィールのチャレンジしたSTEP一覧画面表示
    // ========================================
    public function challengeList($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        $userProf = $this->user->find($id);

        // 登録されていない数字がURLに入力された場合はリダイレクト
        if(empty($userProf)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // ユーザーがチャレンジ中のSTEP
        $userChallengeSteps = getOrderedSteps($userProf->challenges());

        // ユーザーが全てクリアしたSTEP
        $userAllClearSteps = getOrderedSteps($userProf->allClears());

        // ユーザーがチャレンジ中のSTEPのidを格納
        $userChallengeStepIds = getIds($userChallengeSteps);

        // ユーザーが全てクリアしたSTEPのidを格納
        $userAllClearStepIds = getIds($userAllClearSteps);

        // 全てクリアしたSTEPがある場合
        if(!empty($userAllClearStepIds)){
            // チャレンジ中のSTEPのid配列の中から、全てクリアしたSTEPのidのキーを取得する
            foreach ($userAllClearStepIds as $userAllClearStepId){
                $userSearchIds[] = array_search($userAllClearStepId, $userChallengeStepIds);
            }
            // チャレンジ中のSTEPから、全てクリアしたSTEPを削除する
            foreach ($userSearchIds as $userSearchId){
                unset($userChallengeSteps[$userSearchId]);
            }
        }

        return view('user.userChallenge', compact('userProf', 'userChallengeSteps', 'userAllClearSteps'));
    }

    // ========================================
    // ユーザープロフィールの投稿したSTEP一覧画面表示
    // ========================================
    public function postList($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        $userProf = $this->user->find($id);

        // 登録されていない数字がURLに入力された場合はリダイレクト
        if(empty($userProf)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        $userPostSteps = getPaginatedSteps($userProf->steps());

        return view('user.userPost', compact('userProf', 'userPostSteps'));
    }

    // ========================================
    // パスワード変更画面表示
    // ========================================
    public function passEdit() {
        return view('mypage.passEdit',['auth' => $this->auth->user()]);
    }

    // ========================================
    // プロフィール編集アクション
    // ========================================
    public function update(Request $request) {

        $userAuth = $this->auth->user();

        // フォームに入っているemailがDBのemailと同じだったらそのまま登録(念のためバリデーションは行う)
        if(strcmp($request->get('email'), $this->auth->user()->email) === 0) {
            $validated_data = $request->validate([
                'name' => 'required|string|max:20',
                'email' => 'required | string | email | max:255 ',
                'user_img' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:1024',
                'introduce' => 'nullable | string | max:255',
            ],
            [
                'user_img.max:1024' => '画像ファイルの大きさは1MB以下にしてください'
            ]);
        // フォームに入力されているemailがDBのemailから変わっていたら、重複チェックも行う。
        }else{
            $request->validate([
                'name' => 'required|string|max:20',
                'email' => 'required | string | email | max:255 | unique:users',
                'user_img' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:1024',
                'introduce' => 'nullable | string | max:255',
            ],
            [
                'user_img.max:1024' => '画像ファイルの大きさは1MB以下にしてください'
            ]);
        }

        $userAuth->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'introduce' => $request->input('introduce'),
        ])->save();

        // プロフィール画像が入力されていた場合
        if(!empty($imgFile = $request->file('user_img'))){

            // Cloudinaryにアップロード後に生成されたURLを格納
            $logoUrl = uploadImg($imgFile);

            $userAuth->fill([
                'user_img' => $logoUrl
            ])->save();
        }
        return redirect('/mypage/profile')->with('flash_message', __('Profile Edited.'));

    }
    // ========================================
    // パスワード編集アクション
    // ========================================
    public function passUpdate(PassEditRequest $request) {
        $userAuth = $this->auth->user();

        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('old-password'), $userAuth->password))) {
            return redirect('/mypage/password')->with('flash_message', '現在のパスワードが間違っています。');
        }
        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('old-password'), $request->get('password')) === 0) {
            return redirect('/mypage/password')->with('flash_message', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードを変更
        $userAuth->password = bcrypt($request->get('password'));
        $userAuth->save();

        return redirect('/mypage/password')->with('flash_message', 'パスワードを変更しました。');
    }
    // ========================================
    // アカウント削除アクション
    // ========================================
    public function destroy() {
        $this->auth->user()->delete();
        return redirect('/')->with('flash_message', __('Account Deleted.'));
    }
}

