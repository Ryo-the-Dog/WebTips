<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 非会員でも使用可能なルーティング
// 非会員用のトップページ
Route::get('/', 'StepsController@index')->name('index');
// STEP一覧画面表示(会員用のトップページ)
Route::get('/steps', 'StepsController@list')->name('steps.list');
// STEP検索結果一覧画面表示
Route::get('/search', 'StepsController@search')->name('steps.search');
// STEP詳細画面表示
Route::get('/steps/detail/{id}', 'StepsController@show')->name('steps.show');
// 子STEP詳細画面表示
Route::get('/steps/step/{id}', 'ChildStepsController@show')->name('childStep.show');
// ユーザーのチャレンジ中STEP一覧画面表示
Route::get('/userProfile/{id}/challenge', 'UsersController@challengeList')->name('userProfile.challenge');
// ユーザーが投稿したSTEP一覧画面表示
Route::get('/userProfile/{id}/post', 'UsersController@postList')->name('userProfile.post');

// 会員限定のルーティング
Route::group(['middleware' => 'auth'], function() {
    // STEP投稿画面表示
    Route::get('/steps/new', function (){
        return view('steps.new');
    })->name('steps.new');
    // マイページ画面
    // チャレンジしたSTEP一覧画面表示(マイページリンククリックで最初にこのページに飛ぶ)
    Route::get('/mypage/challenge', 'StepsController@challengeList')->name('mypage.challenge');
    // 投稿したSTEP一覧画面表示
    Route::get('/mypage/mystep', 'StepsController@myStepList')->name('mypage.mystep');
    // 投稿したSTEPの編集画面表示
    Route::get('/mypage/mystep/edit/{id}', 'StepsController@edit')->name('mypage.mystepEdit');
    // プロフィール編集画面表示
    Route::get('/mypage/profile', function (){
        return view('mypage.profEdit');
    })->name('mypage.profEdit');
    // パスワード変更画面表示
    Route::get('/mypage/password', function (){
        return view('mypage.passEdit');
    })->name('mypage.passEdit');
    // アカウント削除画面表示
    Route::get('/mypage/profile/delete', function (){
        return view('mypage.profDelete');
    })->name('mypage.profDelete');

    // STEP投稿アクション
    Route::post('/steps/new', 'StepsController@create');
    // STEP編集アクション
    Route::post('/mypage/mystep/edit/{id}', 'StepsController@update')->name('step.edit');
    // STEP削除アクション
    Route::post('/mypage/mystep/delete/{id}', 'StepsController@destroy')->name('step.delete');
    // プロフィール編集アクション
    Route::post('/mypage/profile', 'UsersController@update');
    // パスワード編集アクション
    Route::post('/mypage/password', 'UsersController@passUpdate');
    // アカウント削除アクション
    Route::post('/mypage/profile/delete', 'UsersController@destroy');
    // チャレンジ開始アクション
    Route::post('/steps/challenge/{id}', 'ChallengesController@challenge')->name('step.challenge');
    // チャレンジをやめるアクション
    Route::post('/steps/unchallenge/{id}', 'ChallengesController@unchallenge')->name('step.unchallenge');
    // 子STEPをクリアするアクション
    Route::post('/childSteps/clear/{id}', 'ClearsController@clear')->name('childStep.clear');
    // 子STEP全てのクリアを解除するアクション
    Route::post('/childSteps/allunclear/{id}', 'ClearsController@allunclear')->name('childStep.allunclear');
});

Auth::routes();
