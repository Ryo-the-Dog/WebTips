<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 子STEP完了機能
Route::post('/childSteps/{step}/clear', 'ClearsController@clear');
// 子STEP完了取消機能
Route::post('/childSteps/{step}/unclear', 'ClearsController@unclear');
