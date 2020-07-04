<?php

namespace App\Http\Controllers;

//use App\AllClear;
use App\Clear;
use App\Http\Requests\CreateArticleRequest;
use App\Article;
use App\Chapter;
use App\Category;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use JD\Cloudder\Facades\Cloudder;

class ArticlesController extends Controller
{
    // ========================================
    // 定数
    // ========================================
    // 1ページ当たりの表示件数
    const NUM_PER_PAGE = 6;

    // ========================================
    // コンストラクタ
    // ========================================
    function __construct(Guard $auth, Article $article, Chapter $chapter, Category $category, Clear $clear) {
        $this->auth = $auth;
        $this->article = $article;
        $this->chapter = $chapter;
        $this->category = $category;
        $this->clear = $clear;
//        $this->allClear = $allClear;
    }

    // ========================================
    // ランディングページを表示するアクション
    // ========================================
    public function index() {
        // 未ログインユーザーのみランディングページにアクセスできるようにする
        if(empty($this->auth->user())){

            // ランディングページには６個だけ表示する
            $articles = $this->article->take(6)->get();

            return view('index',compact('articles'));
        }else{
            // ログイン済みの場合は記事一覧画面へ遷移する
            return redirect('/articles');
        }
    }

    // ========================================
    // 記事一覧画面を表示するアクション
    // ========================================
    public function list(Request $request) {
        // カテゴリーが選択された場合
        $input = $request->input();

        // カテゴリーのGETパラメーター取得
        $categoryId = $request->category_id;

        // 並び順のGETパラメーター取得
        $sortId = $request->sort_id;

        // 記事の中から条件に当てはまるものを取得
        $articles = $this->article->getArticleList(self::NUM_PER_PAGE, $input);

        // ページネーションリンクにクエリストリングを付け加える
        $articles->appends($input);

        return view('articles.list', compact('articles','categoryId', 'sortId'));
    }

    // ========================================
    // 記事の検索結果一覧画面を表示するアクション
    // ========================================
    public function search(Request $request) {
        // 検索ワードを格納
        $keyword = $request->input('keyword');
        // 検索欄が空の場合はリダイレクト
        if(empty($keyword)){
            return redirect('/articles');
        }
        // 記事を検索にかける
        if(!empty($keyword)){
            $searchArticles = getPaginatedArticles($this->article->where('title', 'LIKE', "%{$keyword}%"));
        }
        // 検索結果の件数を格納
        $countSearchArticles = count(getOrderedArticles($this->article->where('title', 'LIKE', "%{$keyword}%")));

        return view('articles.searchResult',compact('searchArticles', 'countSearchArticles', 'keyword'));
    }

    // ========================================
    // 記事の詳細画面を表示するアクション
    // ========================================
    public function show($id) {

        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // クリックされた記事のidで指定して格納
        $article = $this->article->find($id);

        if(empty($article)){
            return back()->with('flash_message',__('The URL does not exist.'));
        }

        // このページのチャプターを格納する
        $chapters = $article->chapters;

        // このページのチャプターのidを格納する
//        $chapterIds = getIds($chapters);

        // このページのチャプターの数
        $chaptersCount = count($chapters);

        // チャプターのクリア数が０の時にエラーが出ないように定義しておく
//        $thisClearChaptersCount = 0;

        // ユーザーがログイン中の場合のみチャレンジとクリアの情報を渡す
        if (!empty($this->auth->user())) {

            $userAuth = $this->auth->user();

            // ログインユーザーがこの記事を学習中か判定
            $defaultLearned = ($article->learns->where('user_id', $userAuth->id)->first()) ? true : false;

            // ログインユーザーがこの記事をクリアしているか判定
            $defaultCleared = ($article->clears->where('user_id', $userAuth->id)->first()) ? true : false;

            return view('articles.show', compact('article', 'defaultLearned', 'defaultCleared', 'chaptersCount'));
        } else {
            // 非ログイン時の場合
            return view('articles.show', compact('article'));
        }
    }

    // ========================================
    // ログインユーザーが学習中の記事一覧画面を表示するアクション
    // ========================================
    public function learnList() {
        // 学習中の記事を取得
        $learnArticles = getPaginatedArticles($this->auth->user()->learns());

        // 学習済みの記事を取得
        $clearArticles = getPaginatedArticles($this->auth->user()->clears());

        // 学習中の記事のidを格納
        $learnArticleIds = getIds($learnArticles);

        // 学習済みの記事のidを格納
        $clearArticleIds = getIds($clearArticles);

        // 学習済みの記事がある場合
        if(!empty($clearArticleIds)){

            // 学習中の記事のid配列の中から、学習済みの記事のidのキーを取得する
            foreach ($clearArticleIds as $clearArticleId){
                $searchIds[] = array_search($clearArticleId, $learnArticleIds);
            }

            // 学習中の記事から、学習済みの記事を取り除く
            foreach ($searchIds as $searchId){
                unset($learnArticles[$searchId]);
            }
        }
        return view('mypage.myLearn',compact('learnArticles','clearArticles'));
    }

    // ========================================
    // ログインユーザーが学習済みの記事一覧画面を表示するアクション
    // ========================================
    public function clearList() {
        // チャレンジ中のSTEPを取得
        $learnArticles = getPaginatedArticles($this->auth->user()->learns());

        // 全てクリアしたSTEPを取得
        $clearArticles = getPaginatedArticles($this->auth->user()->clears());

        // チャレンジ中のSTEPのidを格納
        $learnArticleIds = getIds($learnArticles);

        // 全てクリアしたSTEPのidを格納
        $clearArticleIds = getIds($clearArticles);

        // 全てクリアしたSTEPがある場合
        if(!empty($clearArticleIds)){

            // チャレンジ中のSTEPのid配列の中から、全てクリアしたSTEPのidのキーを取得する
            foreach ($clearArticleIds as $clearArticleId){
                $searchIds[] = array_search($clearArticleId, $learnArticleIds);
            }

            // チャレンジ中のSTEPから、全てクリアしたSTEPを取り除く
            foreach ($searchIds as $searchId){
                unset($learnArticles[$searchId]);
            }
        }
        return view('mypage.myClear',compact('learnArticles','clearArticles'));
    }

    // ========================================
    // ログインユーザーが投稿したSTEP一覧画面表示を表示するアクション
    // ========================================
    public function postList() {

        $postArticles = getPaginatedArticles($this->auth->user()->articles());

        return view('mypage.mypost', compact('postArticles'));
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
        $myArticles = $this->auth->user()->articles();

        // ログインユーザーが投稿したSTEPのidを格納
        $myArticleIds = getIds($myArticles->get());

        // URLにログインユーザーが投稿していないidが入力された場合はリダイレクト
        if(empty(in_array($id, $myArticleIds))){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // クリックされたSTEPを格納
        $article = $myArticles->find($id);

        // このSTEPのカテゴリーがカテゴリーフォームで選択済みにさせるためにidを取得する
        $thisCategoryIds = getIds($article->categories);

        return view('mypage.articleEdit', compact('article','thisCategoryIds'));
    }

    // ========================================
    // STEPを投稿するアクション
    // ========================================
    public function create(CreateArticleRequest $request) {

        $article = $this->article;

        // 選択されたカテゴリーを格納
        $categoryIds = $request['category_ids'];

        // 入力されたチャプターのタイトルと内容を配列に格納
        $chapters = $request['chapter'];

        // 記事画像が入力されていない場合
        if(empty($imgFile = $request->file('article_img'))) {
            // 記事のデータをDB(articlesテーブル)に登録
            $id = $article::create([
                'user_id' => $request->user()->id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ])->id;
        }else{

            // Cloudinaryにアップロード後に生成されたURLを格納
            $logoUrl = uploadImg($imgFile);

            // 記事のデータをDB(articlesテーブル)に登録
            $id = $article::create([
                'user_id' => $request->user()->id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'article_img' => $logoUrl
            ])->id;
        }

        // 送信された記事
        $postedArticle = $this->article->find($id);

        // 送信された記事にカテゴリーを紐づける
        $postedArticle->categories()->sync($categoryIds);

        // 上記でDB登録した記事のidを格納
        $articleId = $this->article->find($id)->id;

        // 入力されたチャプターのタイトルと内容を格納
        foreach ($chapters as $chapterData){
            $chapterTitles[] = $chapterData['title'];
            $chapterContents[] = $chapterData['content'];
        }

        $i = 1; // チャプターの番号
        // チャプターのタイトルと内容をそれぞれ回す
        foreach (array_map(null, $chapterTitles, $chapterContents) as [$val1, $val2] ) {
            // チャプターのタイトルか内容、時間のいずれかが空欄の場合は登録しない。またSTEP番号を１つ飛ばして入力された場合でも登録されなくなる。
            if( empty($val1) || empty($val2)){
                break;
            }
            $this->chapter::create([
                // 記事のid
                'article_id' => $articleId,
                // チャプター
                'chapter_number' => $i,
                // チャプターのタイトル
                'title' => $val1,
                // チャプターの内容
                'content' => $val2,
            ]);
            $i++; // チャプターの番号をインクリメント
        }
        return redirect('/articles')->with('flash_message', __('Article Posted.'));
    }

    // ========================================
    // STEPを編集するアクション
    // ========================================
    public function update(CreateArticleRequest $request, $id) {
        // URLに数字以外がURLに入力された場合はリダイレクト
        if(!ctype_digit($id)){
            return back()->with('flash_message',__('Invalid operation was performed.'));
        }

        // ログインユーザーが投稿したSTEPから指定されたidで取得
        $article = $this->auth->user()->articles()->find($id);

        // 万が一自分の投稿じゃないフレーズを編集しようとした場合にはマイページにリダイレクトする
        if(empty($article)) {
            return back()->with('flash_message',__('You can edit only your own articles.'));
        }

        // 親STEPのid
        $articleId = $article->id;

        // 登録済みのチャプター
        $chapters = $this->chapter->where('article_id', $articleId)->get();

        // 入力されたチャプターのタイトルと内容を配列に格納
        $inputChapters = $request['chapter'];

        // カテゴリーのみ格納
        $categoryIds = $request['category_ids'];

        $article->fill([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ])->save();

        // 送信されたSTEPにカテゴリーを紐づける
        $article->categories()->sync($categoryIds);

        // STEP画像が入力されている場合
        if(!empty($imgFile = $request->file('article_img'))) {

            // Cloudinaryにアップロード後に生成されたURLを格納
            $logoUrl = uploadImg($imgFile);

            // DBにURLを保存
            $article->fill([
                'article_img' => $logoUrl
            ])->save();
        }

        // 入力されたチャプターをタイトルと内容ごとに格納
        foreach ($inputChapters as $chapterData){
            $chapterTitles[] = $chapterData['title'];
            $chapterContents[] = $chapterData['content'];
        }

        // チャプターをchaptersテーブルに登録する処理
        $i = 0; // DBのチャプターオブジェクトのキー
        foreach (array_map(null, $chapterTitles, $chapterContents) as [$val1, $val2]) {

            if(count($chapters) > $i) {
                // 登録済みのチャプターについては更新処理をする
                // チャプターのタイトルか内容、時間のいずれかが空欄の場合は登録しない
                if (empty($val1) || empty($val2)) {
                    break;
                }

                // タイトルと内容のみ更新する
                $chapters[$i]->fill([
                    'title' => $val1,
                    'content' => $val2,
                ])->save();

                $i++; // チャプターのキーをインクリメント
            }else{
                // チャプター追加の処理
                // チャプターのタイトルか内容、時間のいずれかが空欄の場合は登録しない
                if (empty($val1) || empty($val2)) {
                    break;
                }
                $i++; // チャプターの番号をインクリメント(上記の更新処理の段階では、$iはキーでチャプター番号より１つ小さいので先にインクリメントする)
                $this->chapter::create([
                    'article_id' => $articleId,
                    'chapter_number' => $i,
                    'title' => $val1,
                    'content' => $val2,
                ]);

            }
        }
        return redirect('/mypage/myarticle')->with('flash_message',__('Article Edited.'));
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
            return redirect('/mypage/mystep')->with('flash_message',__('You can delete only your own articles.'));
        }

        // 送信されたSTEPを削除する
        $myStep->delete();

        return redirect('/mypage/mystep')->with('flash_message', __('Deleted.'));
    }
}
