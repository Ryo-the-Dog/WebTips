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
Route::get('/', 'ArticlesController@index')->name('index');
// 記事一覧画面表示(会員用のトップページ)
Route::get('/articles', 'ArticlesController@list')->name('articles.list');
// 記事検索結果一覧画面表示
Route::get('/search', 'ArticlesController@search')->name('articles.search');
// 記事詳細画面表示
Route::get('/articles/detail/{id}', 'ArticlesController@show')->name('articles.show');
// ユーザーの学習中の記事一覧画面表示
Route::get('/userProfile/{id}/learn', 'UsersController@learnList')->name('userProfile.learn');
// ユーザーがクリアした記事一覧画面表示
Route::get('/userProfile/{id}/clear', 'UsersController@clearList')->name('userProfile.clear');
// ユーザーが投稿したSTEP一覧画面表示
Route::get('/userProfile/{id}/post', 'UsersController@postList')->name('userProfile.post');

// 会員限定のルーティング
Route::group(['middleware' => 'auth'], function() {
    // STEP投稿画面表示
    Route::get('/articles/new', function (){
        return view('articles.new');
    })->name('articles.new');

    // マイページ画面
    // 学習中の記事一覧画面表示(マイページリンククリックで最初にこのページに飛ぶ)
    Route::get('/mypage/learn', 'ArticlesController@learnList')->name('mypage.learn');
    // 学習中の記事一覧画面表示(マイページリンククリックで最初にこのページに飛ぶ)
    Route::get('/mypage/clear', 'ArticlesController@clearList')->name('mypage.clear');
    // 投稿し記事STEP一覧画面表示
    Route::get('/mypage/myarticle', 'ArticlesController@postList')->name('mypage.post');
    // 投稿した記事の編集画面表示
    Route::get('/mypage/myarticle/edit/{id}', 'ArticlesController@edit')->name('mypage.myarticleEdit');
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

    // 記事投稿アクション
    Route::post('/articles/new', 'ArticlesController@create');
    // 記事編集アクション
    Route::post('/mypage/myarticle/edit/{id}', 'ArticlesController@update')->name('article.edit');
    // 記事削除アクション
    Route::post('/mypage/myarticle/delete/{id}', 'ArticlesController@destroy')->name('article.delete');
    // プロフィール編集アクション
    Route::post('/mypage/profile', 'UsersController@update');
    // パスワード編集アクション
    Route::post('/mypage/password', 'UsersController@passUpdate');
    // アカウント削除アクション
    Route::post('/mypage/profile/delete', 'UsersController@destroy');
    // リスト追加アクション
    Route::post('/articles/learn/{id}', 'LearnsController@learn')->name('article.learn');
    // リスト削除アクション
    Route::post('/articles/unlearn/{id}', 'LearnsController@unlearn')->name('article.unlearn');
    // チャプターをクリアするアクション
    Route::post('/articles/clear/{id}', 'ClearsController@clear')->name('article.clear');
    // チャプター全てのクリアを解除するアクション
    Route::post('/articles/unclear/{id}', 'ClearsController@unclear')->name('article.unclear');
});

Auth::routes();
