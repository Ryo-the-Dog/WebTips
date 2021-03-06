<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PassEditRequest;
use App\Article;
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
    function __construct(Guard $auth, User $user, Category $category, Article $article) {
        $this->auth = $auth;
        $this->user = $user;
        $this->category = $category;
        $this->article = $article;
    }

    // ========================================
    // ユーザープロフィールの学習中リスト一覧画面表示
    // ========================================
    public function learnList($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        $userProf = $this->user->find($id);

        // 登録されていない数字がURLに入力された場合はリダイレクト
        if(empty($userProf)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // ユーザーが学習中の記事
        $userLearnArticles = getPaginatedArticles($userProf->learns());

        // ユーザーがクリアした記事
        $userClearArticles = getPaginatedArticles($userProf->clears());

        // ユーザーが学習中の記事のidを格納
        $userLearnArticleIds = getIds($userLearnArticles);

        // ユーザーがクリアした記事のidを格納
        $userClearArticleIds = getIds($userClearArticles);

        // 全てクリアしたSTEPがある場合
        if(!empty($userClearArticleIds)){
            // 学習中の記事のid配列の中から、クリアした記事のidのキーを取得する
            foreach ($userClearArticleIds as $userClearArticleId){
                $userSearchIds[] = array_search($userClearArticleId, $userLearnArticleIds);
            }
            // 学習中の記事から、クリアした記事を削除する
            foreach ($userSearchIds as $userSearchId){
                unset($userLearnArticles[$userSearchId]);
            }
        }

        return view('user.userLearn', compact('userProf', 'userLearnArticles', 'userClearArticles'));
    }

    // ========================================
    // ユーザープロフィールの学習済みリスト一覧画面表示
    // ========================================
    public function clearList($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        $userProf = $this->user->find($id);

        // 登録されていない数字がURLに入力された場合はリダイレクト
        if(empty($userProf)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // ユーザーが学習中の記事
        $userLearnArticles = getPaginatedArticles($userProf->learns());

        // ユーザーがクリアした記事
        $userClearArticles = getPaginatedArticles($userProf->clears());

        // ユーザーが学習中の記事のidを格納
        $userLearnArticleIds = getIds($userLearnArticles);

        // ユーザーがクリアした記事のidを格納
        $userClearArticleIds = getIds($userClearArticles);

        // 全てクリアしたSTEPがある場合
        if(!empty($userClearArticleIds)){
            // 学習中の記事のid配列の中から、クリアした記事のidのキーを取得する
            foreach ($userClearArticleIds as $userClearArticleId){
                $userSearchIds[] = array_search($userClearArticleId, $userLearnArticleIds);
            }
            // 学習中の記事から、クリアした記事を削除する
            foreach ($userSearchIds as $userSearchId){
                unset($userLearnArticles[$userSearchId]);
            }
        }

        return view('user.userClear', compact('userProf', 'userLearnArticles', 'userClearArticles'));
    }

    // ========================================
    // ユーザープロフィールの投稿した記事一覧画面表示
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

        $userPostArticles = getPaginatedArticles($userProf->articles());

        return view('user.userPost', compact('userProf', 'userPostArticles'));
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

