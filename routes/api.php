<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ログインユーザー
Route::get('/user', fn() => Auth::user())->name('user');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// axios
// リスト追加
Route::post('/articles/{articleId}/learn', 'LearnsController@learn');
Route::post('/articles/{articleId}/unlearn', 'LearnsController@unlearn');
// クリア
//Route::post('/articles/{article}/clear', 'ClearsController@clear');
//Route::post('/articles/{article}/unclear', 'ClearsController@unclear');
