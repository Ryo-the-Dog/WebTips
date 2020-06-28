<?php

namespace App\Http\Controllers;

use App\AllClear;
use App\Clear;
use App\Http\Requests\CreateStepRequest;
use App\Step;
use App\ChildStep;
use App\Category;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use JD\Cloudder\Facades\Cloudder;

class StepsController extends Controller
{
    // ========================================
    // 定数
    // ========================================
    // 1ページ当たりの表示件数
    const NUM_PER_PAGE = 6;

    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Step $step, ChildStep $childStep, Category $category, Clear $clear, AllClear $allClear) {
        $this->auth = $auth;
        $this->step = $step;
        $this->childStep = $childStep;
        $this->category = $category;
        $this->clear = $clear;
        $this->allClear = $allClear;
    }

    // ========================================
    // ランディングページを表示するアクション
    // ========================================
    public function index() {
        // 未ログインユーザーのみランディングページにアクセスできるようにする
        if(empty($this->auth->user())){

            // ランディングページには６個だけ表示する
            $steps = $this->step->take(6)->get();

            return view('index',compact('steps'));
        }else{
            // ログイン済みの場合はSTEP一覧画面へ遷移する
            return redirect('/steps');
        }
    }

    // ========================================
    // STEPを一覧画面を表示するアクション
    // ========================================
    public function list(Request $request) {
        // カテゴリーが選択された場合
        $input = $request->input();

        // カテゴリーのGETパラメーター取得
        $categoryId = $request->category_id;

        // 並び順のGETパラメーター取得
        $sortId = $request->sort_id;

        // STEPの中から条件に当てはまるものを取得
        $steps = $this->step->getStepList(self::NUM_PER_PAGE, $input);

        // ページネーションリンクにクエリストリングを付け加える
        $steps->appends($input);

        return view('steps.list', compact('steps','categoryId', 'sortId'));
    }

    // ========================================
    // STEPの検索結果一覧画面を表示するアクション
    // ========================================
    public function search(Request $request) {
        // 検索ワードを格納
        $keyword = $request->input('keyword');
        // 検索欄が空の場合はリダイレクト
        if(empty($keyword)){
            return redirect('/steps');
        }
        // STEPを検索にかける
        if(!empty($keyword)){
            $searchSteps = getPaginatedSteps($this->step->where('title', 'LIKE', "%{$keyword}%"));
        }
        // 検索結果の件数を格納
        $countSearchSteps = count(getOrderedSteps($this->step->where('title', 'LIKE', "%{$keyword}%")));

        return view('steps.searchResult',compact('searchSteps', 'countSearchSteps', 'keyword'));
    }

    // ========================================
    // STEPの詳細画面を表示するアクション
    // ========================================
    public function show($id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // クリックされたSTEPのidで指定して格納
        $step = $this->step->find($id);

        if(empty($step)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // このページの子STEPを格納する
        $childSteps = $step->childSteps;

        // このページの子STEPのidを格納する
        $childStepIds = getIds($childSteps);

        // このページの子STEPの数
        $childStepsCount = count($childSteps);

        // 子STEPのクリア数が０の時にエラーが出ないように定義しておく
        $thisClearChildStepsCount = 0;

        // ユーザーがログイン中の場合のみチャレンジとクリアの情報を渡す
        if (!empty($this->auth->user())) {

            $userAuth = $this->auth->user();

            // ログイン中のユーザーがこのSTEPにチャレンジ中か判定
            $defaultChallenged = ($step->challenges->where('user_id', $userAuth->id)->first()) ? true : false;

            // ログインユーザーの子STEPのクリア状況
            $myClearChildSteps = $this->clear->all()->where('user_id', $userAuth->id);

            // ログインユーザーがクリアした子STEPの中から、このページのクリアした子STEPを取得する
            if(!empty($childStepIds)){
                foreach ($childStepIds as $childStepId) {
                    if (!$myClearChildSteps->where('child_step_id', $childStepId)->isEmpty()) {
                        $thisClearChildSteps[] = $myClearChildSteps->where('child_step_id', $childStepId);
                    }
                }
            }

            // クリアした子STEPがある場合
            if (!empty($thisClearChildSteps)) {
                // クリアした子STEPの数
                $thisClearChildStepsCount = $thisClearChildSteps ? count($thisClearChildSteps) : 0;

                // 全てのSTEPをクリアしている場合はtrue
                $allClearFlg = ($step->allClears->where('user_id', $userAuth->id)->first()) ? true : false;

                return view('steps.show', compact('step', 'defaultChallenged', 'childStepsCount', 'thisClearChildStepsCount', 'myClearChildSteps', 'allClearFlg'));
            }else{
                // クリアしたSTEPが無い場合
                return view('steps.show', compact('step', 'defaultChallenged', 'childStepsCount', 'thisClearChildStepsCount'));
            }
        } else {
            // 非ログイン時の場合
            return view('steps.show', compact('step'));
        }
    }

    // ========================================
    // ログインユーザーがチャレンジしたSTEP一覧画面を表示するアクション
    // ========================================
    public function challengeList() {
        // チャレンジ中のSTEPを取得
        $challengeSteps = getOrderedSteps($this->auth->user()->challenges());

        // 全てクリアしたSTEPを取得
        $allClearSteps = getOrderedSteps($this->auth->user()->allClears());

        // チャレンジ中のSTEPのidを格納
        $challengeStepIds = getIds($challengeSteps);

        // 全てクリアしたSTEPのidを格納
        $allClearStepIds = getIds($allClearSteps);

        // 全てクリアしたSTEPがある場合
        if(!empty($allClearStepIds)){

            // チャレンジ中のSTEPのid配列の中から、全てクリアしたSTEPのidのキーを取得する
            foreach ($allClearStepIds as $allClearStepId){
                $searchIds[] = array_search($allClearStepId, $challengeStepIds);
            }

            // チャレンジ中のSTEPから、全てクリアしたSTEPを取り除く
            foreach ($searchIds as $searchId){
                unset($challengeSteps[$searchId]);
            }
        }
        return view('mypage.myChallenge',compact('challengeSteps','allClearSteps'));
    }

    // ========================================
    // ログインユーザーが投稿したSTEP一覧画面表示を表示するアクション
    // ========================================
    public function myStepList() {

        $mySteps = getPaginatedSteps($this->auth->user()->steps());

        return view('mypage.mystep', compact('mySteps'));
    }

    // ========================================
    // ログインユーザーが投稿したSTEPの編集画面を表示するアクション
    // ========================================
    public function edit($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // ログインユーザーが投稿したSTEPを格納
        $mySteps = $this->auth->user()->steps();

        // ログインユーザーが投稿したSTEPのidを格納
        $myStepIds = getIds($mySteps->get());

        // URLにログインユーザーが投稿していないidが入力された場合はリダイレクト
        if(empty(in_array($id, $myStepIds))){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // クリックされたSTEPを格納
        $step = $mySteps->find($id);

        // このSTEPのカテゴリーがカテゴリーフォームで選択済みにさせるためにidを取得する
        $thisCategoryIds = getIds($step->categories);

        return view('mypage.stepEdit', compact('step','thisCategoryIds'));
    }

    // ========================================
    // STEPを投稿するアクション
    // ========================================
    public function create(CreateStepRequest $request) {

        $step = $this->step;

        // 選択されたカテゴリーを格納
        $categoryIds = $request['category_ids'];

        // 入力された子STEPのタイトルと内容を配列に格納
        $childSteps = $request['child_step'];

        // STEP画像が入力されていない場合
        if(empty($imgFile = $request->file('step_img'))) {
            // STEPのデータをDB(stepsテーブル)に登録
            $id = $step::create([
                'user_id' => $request->user()->id,
                'title' => $request->input('title'),
//                'time' => $request->input('time'),
                'description' => $request->input('description'),
            ])->id;
        }else{

            // Cloudinaryにアップロード後に生成されたURLを格納
            $logoUrl = uploadImg($imgFile);

            // STEPのデータをDB(stepsテーブル)に登録
            $id = $step::create([
                'user_id' => $request->user()->id,
                'title' => $request->input('title'),
//                'time' => $request->input('time'),
                'description' => $request->input('description'),
                'step_img' => $logoUrl
            ])->id;
        }

        // 送信されたSTEP
        $postedStep = $this->step->find($id);

        // 送信されたSTEPにカテゴリーを紐づける
        $postedStep->categories()->sync($categoryIds);

        // 上記でDB登録したSTEPのidを格納
        $stepId = $this->step->find($id)->id;

        // 入力された子STEPのタイトルと内容を格納
        foreach ($childSteps as $childStepData){
            $childStepTitles[] = $childStepData['title'];
            $childStepContents[] = $childStepData['content'];
//            $childStepTimes[] = $childStepData['time'];
        }

        $i = 1; // 子STEPの番号
        // 子STEPのタイトルと内容をそれぞれ回す
        foreach (array_map(null, $childStepTitles, $childStepContents) as [$val1, $val2] ) {
            // 子STEPのタイトルか内容、時間のいずれかが空欄の場合は登録しない。またSTEP番号を１つ飛ばして入力された場合でも登録されなくなる。
            if( empty($val1) || empty($val2)){
                break;
            }
            $this->childStep::create([
                // 親STEPのid
                'step_id' => $stepId,
                // 子STEP
                'step_number' => $i,
                // 子STEPのタイトル
                'title' => $val1,
                // 子STEPの内容
                'content' => $val2,
                // 子STEPの目安達成時間
//                'time' => $val3
            ]);
            $i++; // 子STEPの番号をインクリメント
        }
        return redirect('/steps')->with('flash_message', __('STEP Registered.'));
    }

    // ========================================
    // STEPを編集するアクション
    // ========================================
    public function update(CreateStepRequest $request, $id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // ログインユーザーが投稿したSTEPから指定されたidで取得
        $step = $this->auth->user()->steps()->find($id);

        // 万が一自分の投稿じゃないフレーズを編集しようとした場合にはマイページにリダイレクトする
        if(empty($step)) {
            return redirect('/mypage/mystep')->with('flash_message',__('You can edit only your own steps.'));
        }

        // 親STEPのid
        $stepId = $step->id;

        // 登録済みの子STEP
        $childSteps = $this->childStep->where('step_id', $stepId)->get();

        // 入力された子STEPのタイトルと内容を配列に格納
        $inputChildSteps = $request['child_step'];

        // カテゴリーのみ格納
        $categoryIds = $request['category_ids'];

        $step->fill([
            'title' => $request->input('title'),
//            'time' => $request->input('time'),
            'description' => $request->input('description'),
        ])->save();

        // 送信されたSTEPにカテゴリーを紐づける
        $step->categories()->sync($categoryIds);

        // STEP画像が入力されている場合
        if(!empty($imgFile = $request->file('step_img'))) {

            // Cloudinaryにアップロード後に生成されたURLを格納
            $logoUrl = uploadImg($imgFile);

            // DBにURLを保存
            $step->fill([
                'step_img' => $logoUrl
            ])->save();
        }

        // 入力された子STEPをタイトルと内容ごとに格納
        foreach ($inputChildSteps as $childStepData){
            $childStepTitles[] = $childStepData['title'];
            $childStepContents[] = $childStepData['content'];
//            $childStepTimes[] = $childStepData['time'];
        }

        // 子STEPをchildStepsテーブルに登録する処理
        $i = 0; // DBの子STEPオブジェクトのキー
        foreach (array_map(null, $childStepTitles, $childStepContents) as [$val1, $val2]) {

            if(count($childSteps) > $i) {
                // 登録済みの子STEPについては更新処理をする
                // 子STEPのタイトルか内容、時間のいずれかが空欄の場合は登録しない
                if (empty($val1) || empty($val2)) {
                    break;
                }

                // タイトルと内容のみ更新する
                $childSteps[$i]->fill([
                    'title' => $val1,
                    'content' => $val2,
//                    'time' => $val3
                ])->save();

                $i++; // 子STEPのキーをインクリメント
            }else{
                // 子STEP追加の処理
                // 子STEPのタイトルか内容、時間のいずれかが空欄の場合は登録しない
                if (empty($val1) || empty($val2)) {
                    break;
                }
                $i++; // 子STEPの番号をインクリメント(上記の更新処理の段階では、$iはキーで子STEP番号より１つ小さいので先にインクリメントする)
                $this->childStep::create([
                    'step_id' => $stepId,
                    'step_number' => $i,
                    'title' => $val1,
                    'content' => $val2,
//                    'time' => $val3
                ]);

                // 子STEPが追加された場合、このSTEPをallClearsテーブルから削除する
                $this->allClear->where('step_id', $stepId)->delete();

            }
        }
        return redirect('/mypage/mystep')->with('flash_message',__('STEP Edited.'));
    }

    // ========================================
    // STEPを削除するアクション
    // ========================================
    public function destroy($id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // 自分が投稿したSTEPのみ削除できるようにする
        $myStep = $this->auth->user()->steps()->find($id);

        // 万が一自分の投稿じゃないSTEPを削除しようとした場合にはマイページにリダイレクトする
        if(empty($myStep)) {
            return redirect('/mypage/mystep')->with('flash_message',__('You can delete only your own steps.'));
        }

        // 送信されたSTEPを削除する
        $myStep->delete();

        return redirect('/mypage/mystep')->with('flash_message', __('Deleted.'));
    }
}
