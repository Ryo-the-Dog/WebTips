<?php

use App\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->delete();

        $faker = Faker::create('ja_JP');

        DB::table('chapters')->insert([
            [
                'id' => 1,
                'article_id' => 1,
                'chapter_number' => 1,
                'title' => 'Homebrewのインストール',
                'content' => "Macのターミナルを立ち上げて、[Homebrew](https://brew.sh/index_ja)をインストールするためのコマンドを実行します。\n
```
$ /usr/bin/ruby -e \"$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)\"
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 2,
                'article_id' => 1,
                'chapter_number' => 2,
                'title' => 'Brewfileを作成する',
                'content' => "ホームディレクトリにBrewfileを作成します。
```
$ touch Brewfile
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 3,
                'article_id' => 1,
                'chapter_number' => 3,
                'title' => 'Brewfileを編集する',
                'content' => "Brewfileにインストールするパッケージやアプリを書きます。
```
cask_args appdir: \"/Applications\"

tap \"heroku/brew\"

brew \"heroku\"
brew \"jq\"
# masはmasコマンドでAppStoreからアプリをインストールするためのツールです
brew \"mas\"
brew \"mysql-client\"
brew \"tcptraceroute\"
brew \"terminal-notifier\"
brew \"tfenv\"
brew \"tmux\"
brew \"tree\"
brew \"zplug\"

cask \"1password\"
cask \"alfred\"
cask \"appcleaner\"
cask \"bettertouchtool\"
cask \"docker\"
cask \"google-chrome\"
cask \"google-japanese-ime\"
cask \"intellij-idea\"
cask \"imageoptim\"
cask \"karabiner-elements\"
cask \"keyboardcleantool\"
cask \"mysqlworkbench\"
cask \"visual-studio-code\"
cask \"vlc\"

mas \"Be Focused Pro\", id: 961632517
mas \"Keynote\", id: 409183694
mas \"The Unarchiver\", id: 425424353
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 4,
                'article_id' => 1,
                'chapter_number' => 4,
                'title' => 'AppStoreにログインする',
                'content' => "masコマンドでインストールするために、事前にAppStoreにログインしておいてください。",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 5,
                'article_id' => 1,
                'chapter_number' => 5,
                'title' => 'パッケージのインストール',
                'content' => "brew bundleコマンドを実行することで、Brewfileに書いたパッケージをインストールできます。
```
$ brew bundle
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 6,
                'article_id' => 1,
                'chapter_number' => 6,
                'title' => 'Macを再起動する',
                'content' => "インストールしたソフトによっては再起動が必要な場合があります。",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 7,
                'article_id' => 1,
                'chapter_number' => 7,
                'title' => 'まとめ',
                'content' => "以上がMacの環境構築を自動化する方法です。劇的に作業効率が改善するので是非お試しください！",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 8,
                'article_id' => 2,
                'chapter_number' => 1,
                'title' => 'vue-cli のインストール',
                'content' => "
```
$ npm install -g @vue/cli
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 9,
                'article_id' => 2,
                'chapter_number' => 2,
                'title' => 'プロジェクトを作成する',
                'content' => "任意の名前でプロジェクトを作成します。この際に設定について色々と質問されますが、特にこだわりが無ければ全てreturnキーで進めて大丈夫です。
```
$ vue create my-project
```

# ※ permission deniedエラーが発生した場合
私の場合、ここでUnhandled rejection Error: EACCES: permission deniedのエラーが出ました。下記リンクを参考にして解決しました。
(https://stackoverflow.com/questions/50639690/on-npm-install-unhandled-rejection-error-eacces-permission-denied)
```
$ sudo npm cache clean --force --unsafe-perm
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 10,
                'article_id' => 2,
                'chapter_number' => 3,
                'title' => 'ローカルホストにアクセス',
                'content' => "まずプロジェクトのディレクトリに移動します。
```
$ cd my-project
```
続いてサーバーを起動します。
```
$ npm run serve
```
ブラウザで http://localhost:8080/ にアクセスすると、デフォルトのサンプル画面が表示されます。

                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 11,
                'article_id' => 2,
                'chapter_number' => 4,
                'title' => 'ファイルを編集してみる',
                'content' => "デフォルトでは./src/App.vueというファイルにおいて、HelloWorld.vueファイルを読み込んでいます。このファイルの内容を試しに下記のように変更してみましょう。
```
<template>
  <div>
    <p>
      サンプル
    </p>
  </div>
</template>
```
改めて npm run serve を実行して http://localhost:8080 を見ると内容が変更されています。

                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 12,
                'article_id' => 2,
                'chapter_number' => 5,
                'title' => 'まとめ',
                'content' => '以上で最低限のvue-cliの環境構築ができるようになりました。',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 13,
                'article_id' => 3,
                'chapter_number' => 1,
                'title' => 'モデルとマイグレーションファイル作成',
                'content' => "必要なテーブルは、users・posts・likesの３つです。\n
usersテーブルとモデルは下記コマンドでログイン機能をインストールすると自動で作成されます。
```
$ php artisan make:auth
```
次に記事データを管理するPostモデルとマイグレーションファイルを作成します。
```
$ php artisan make:model Post -m
```
続いていいねのデータを管理するLikeモデルとマイグレーションファイルを作成します。
```
$ php artisan make:model Like -m
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 14,
                'article_id' => 3,
                'chapter_number' => 2,
                'title' => 'マイグレーションの実行',
                'content' => "
**/database/migrations/****_**_**_******_create_posts_table.php**
```php
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint \$table) {
            \$table->bigIncrements('id');
            \$table->bigInteger('user_id')->unsigned();
            \$table->string('title');
            \$table->timestamps();
            // 外部キー制約の設定
            \$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint \$table) {
            \$table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('posts');
    }
}
```
**/database/migrations/****_**_**_******_create_likes_table.php**
```php
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learns', function (Blueprint \$table) {
            \$table->bigInteger('user_id')->unsigned()->index();
            \$table->bigInteger('post_id')->unsigned()->index();
            \$table->timestamps();
            // 外部キー制約の設定
            \$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            \$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learns', function (Blueprint \$table) {
            \$table->dropForeign(['post_id']);
        });
        Schema::dropIfExists('likes');
    }
}

```
マイグレーションを実行してテーブルを作成します。
```
$ php artisan migrate
```
",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 15,
                'article_id' => 3,
                'chapter_number' => 3,
                'title' => 'リレーションを設定する',
                'content' => "まずは、usersテーブルからpostとlikesのデータを取得できるように「１(user)：多(post)」、「多(user)：多(like)」のリレーションを設定します。
```php
// 省略

class User extends Authenticatable
{
    // 省略

    // Postモデルとのリレーション
    public function posts() {
        return \$this->hasMany('App\Post');
    }
    // Likeモデルとのリレーション
    public function likes() {
        return \$this->belongsToMany(
            'App\Post', 'likes', 'user_id', 'post_id'
        )->withTimestamps();
    }
```
続いてpostsテーブルからusersとlikesのデータを取得できるように「１(post)：１(user)」、「１(post)：多(like)」のリレーションを設定します。
```php
// 省略

class Post extends Model
{
    // Userモデルに対するリレーション
    public function user()
    {
        return \$this->belongsTo('App\User');
    }
    // Likeモデルに対するリレーション
    public  function likes() {
        return \$this->hasMany('App\Like');
    }
}
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 16,
                'article_id' => 3,
                'chapter_number' => 4,
                'title' => 'コントローラーの作成',
                'content' => "まずは記事のコントローラーを作成します。
```
$ php artisan make:controller PostsController
```
**/app/Http/Controllers/PostsController.php**
```php
<?php
namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    // 記事を表示するメソッド
    public function index(){
            // 全ての記事のレコードを取得する
            \$posts = Post::all();

            return view('posts.index', ['posts' => \$posts]);
        }
}
```
続いていいねのコントローラーを作成します。
```
$ php artisan make:controller LikesController
```
**/app/Http/Controllers/LikesController.php**
```php
<?php
namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    // いいねを追加するメソッド
    public function like(Request \$request, \$id) {

        \$request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        // ユーザーのidを格納
        \$userId = Auth::user()->id;

        // likesテーブルにいいねが押された記事のidが存在していない場合、ユーザーのidと記事のidを保存する
        if(!\Like::where('post_id', \$id)->where('user_id', \$userId)->exists()){
            \$like = Like::create([
                'user_id' => \$userId,
                'post_id' => \$id,
            ]);
        }

        \$likeCount = count(Like::where('post_id', \$id)->get());

        return response()->json(['likeCount' => \$likeCount]);
    }
    // いいねを解除するメソッド
    public function unlike(Request \$request, \$id) {

        // ユーザーのidを格納
        \$userId = Auth::user()->id;

        // likesテーブルから該当のidを検索して削除する
        \$like = Like::where('user_id', \$userId)->where('post_id', \$id)->delete();

        \$likeCount = count(Like::where('post_id', \$id)->get());

        return response()->json(['likeCount' => \$likeCount]);
    }
}
```
return response()->json() とすることで、Laravelで処理したデータをJSに渡すことができます。今回はいいね数をJSON形式で渡していますが、特にデータを渡さなくてもいい場合は「json()」として何も渡さずに返すこともできます。
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 17,
                'article_id' => 3,
                'chapter_number' => 5,
                'title' => 'ルーティングの設定',
                'content' => "
**/routes/web.php**
```php
// 記事を表示
Route::get('/', 'PostsController@index')->name('index');
// いいね追加
Route::post('/posts/{postId}/like', 'LikesController@like');
// いいね解除
Route::post('/posts/{postId}/unlike', 'LikesController@unlike');
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 18,
                'article_id' => 3,
                'chapter_number' => 6,
                'title' => 'いいねボタンのLikeBtn.vueを作成してビューで読み込む',
                'content' => "まずは見た目だけ作っていきます。\n
**/resources/js/components/LikeBtn.vue**
```Vue.js
<template>
    <div>
        <span v-if=\"!liked\" class=\"btn btn-primary\" >
            いいね{{likeCount}}
        </span>
        <span v-else class=\"btn btn-primary\" >
            いいね解除{{likeCount}}
        </span>
    </div>
</template>
<script>
    export default {
        name: \"LikeBtn\",
        data() {
            return {
                // axios
                liked: false, // いいねされているか
                likeCount: 0, // いいね数
            }
        }
    }
</script>
```
コンポーネントを登録します。\n
**/resources/js/app.js**
```Vue.js
Vue.component('likebtn', require('./components/LikeBtn.vue').default);
```
**/resources/views/index.blade.php**
```php
@extends('layouts.app')

@section('content')
    <div class=\"container\">
        <div class=\"row\">
            @foreach (\$posts as \$post)
                <div class=\"col-sm-6\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h3 class=\"card-title\">{{ \$post->title }}</h3>

                            //いいねボタンを読み込む
                            <likebtn></likebtn>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
```
",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 19,
                'article_id' => 3,
                'chapter_number' => 7,
                'title' => 'LikeBtnコンポーネントに必要な値を渡す',
                'content' => "投稿のid・ユーザーのid・いいね状況・いいね数を渡します。\n
default-likedは、postとリレーション設定されているlikesを取得し、ユーザーのidで検索を掛けていいね済みかどうかを値として渡しています。\n
**/resources/views/index.blade.php**
```php
@extends('layouts.app')

@section('content')
    <div class=\"container\">
        <div class=\"row\">
            @foreach (\$posts as \$post)
                <div class=\"col-sm-6\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h3 class=\"card-title\">{{ \$post->title }}</h3>

                            // 値を渡していいねボタンを読み込む
                            <likebtn
                            :post-id='{{json_encode(\$post->id)} }'
                            :user-id='{{json_encode(\$userAuth->id)} }'
                            :default-liked='{{json_encode(\$post->likes->where('user_id', \$userAuth->id)->exists())} }'
                            :default-count='{{json_encode(count(\$post->likes)} }'></likebtn>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
```

LikeBtnコンポーネントで値を受け取り、データの更新処理をします。
**/resources/js/components/LikeBtn.vue**
```Vue.js
<template>
    <div>
        <span v-if=\"!liked\" @click=\"like(post.id)\" class=\"btn btn-primary\" >
            いいね{{likeCount}}
        </span>
        <span v-else @click=\"unlike(post . id)\" class=\"btn btn-primary\" >
            いいね解除{{likeCount}}
        </span>
    </div>
</template>
<script>
    export default {
        name: \"LikeBtn\",
        props: ['postId', 'userId', 'defaultLiked', 'defaultCount'],
        data() {
            return {
                // axios
                liked: false, // いいねされているか
                likeCount: 0, // いいね数
            }
        },
        // createdではDOMの生成前にdataの値を更新できます。ビューから渡ってきたいいねに関するDB情報を元に更新します。
        created() {
            this.liked = this.defaultLearn
            this.likeCount = this.defaultCount
        }
    }
</script>
```
",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 20,
                'article_id' => 3,
                'chapter_number' => 8,
                'title' => 'LikeBtnコンポーネントのメソッドを定義する',
                'content' => "likeメソッドとunlikeを定義します。
**/resources/js/components/LikeBtn.vue**
```Vue.js
<template>
    <div>
        <span v-if=\"!liked\" @click=\"like(postId)\" class=\"btn btn-primary\" >
            いいね{{likeCount}}
        </span>
        <span v-else @click=\"unlike(postId)\" class=\"btn btn-primary\" >
            いいね解除{{likeCount}}
        </span>
    </div>
</template>
<script>
    export default {
        name: \"LikeBtn\",
        props: ['postId', 'userId', 'defaultLiked', 'defaultCount'],
        data() {
            return {
                // axios
                liked: false, // いいねされているか
                likeCount: 0, // いいね数
            }
        },
        // createdではDOMの生成前にdataの値を更新できます。ビューで渡されたいいねに関するDB情報を元に更新します。
        created() {
            this.liked = this.defaultLearn
            this.likeCount = this.defaultCount
        }
        methods: {
            like(postId) {
                // ⑤のweb.phpで定義したルーティングを呼び出します
                const url = `/web/posts/\${postId}/like`

                // 上記のurlにaxiosでpost送信します
                axios.post(url,{
                    // いいねボタンを押したユーザーのidを一緒に送信します
                    user_id: this.userAuth.id
                })
                    .then(response => {
                        // いいね済みにします
                        this.liked = true
                        // LikesContorollerのlikeメソッドで渡されたいいね数を格納します
                        this.likeCount = response.data.likeCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            },
            unlike(postId) {
                // ⑤のweb.phpで定義したルーティングを呼び出します
                const url = `/web/posts/\${postId}/unlike`

                // 上記のurlにaxiosでpost送信します
                axios.post(url,{
                    // いいねボタンを押したユーザーのidを一緒に送信します
                    user_id: this.userAuth.id
                })
                    .then(response => {
                        // いいねを解除します
                        this.liked = false
                        // LikesContorollerのunlikeメソッドで渡されたいいね数を格納します
                        this.likeCount = response.data.likeCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            },
        }
    }
</script>
```
",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 21,
                'article_id' => 3,
                'chapter_number' => 9,
                'title' => 'まとめ',
                'content' => "以上、いいね機能の実装方法でした。\n
この方法であればいいね機能だけでなく、マイリスト機能などにも応用できるので是非試してみてください！",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 22,
                'article_id' => 4,
                'chapter_number' => 1,
                'title' => '事前準備',
                'content' => "ログイン機能をインストールして、会員登録をできるようにしておいてください。※本記事ではフラッシュメッセージの実装方法がメインのため、ログイン機能については各自でご確認をお願いします。",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 23,
                'article_id' => 4,
                'chapter_number' => 2,
                'title' => 'RegisterControllerに処理を実装する',
                'content' => "会員登録後に、セッションでメッセージを渡す処理を実装します。
**/app/Http/Controllers/Auth/RegisterController.php**
```php
// 省略
class RegisterController extends Controller
{
    // 省略

    // 会員登録後の処理
    protected function registered(Request \$request, \$user)
    {
        // 登録が完了したら、第二引数を'flash_message'としてビューに渡します
        return redirect('/articles')->with('flash_message', __('Registration completed.'));
    }
}
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 24,
                'article_id' => 4,
                'chapter_number' => 3,
                'title' => 'Vueファイルの作成と登録してビューで読み込む',
                'content' => "/resources/js/components/FlashMessage.vueを作成します。\n
作成したVueファイルを登録します。
**/resources/js/app.js**
```js
Vue.component('flashmessage', require('./components/FlashMessage.vue').default);
```
登録したVueコンポーネントをビューで読み込みます。\n
どのページでもフラッシュメッセージを使えるようにしたいので、app.blade.phpで読み込みます。\n
**/resources/views/layouts/app.blade.php**
```php
// 省略
<div id=\"app\">
        // ナビゲーション
        @include('navbar')

        // フラッシュメッセージ
        @if(session('flash_message'))
            <flashmessage
            :flash-message=\"{{json_encode(session('flash_message'))} }\"
            ></flashmessage>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
```
上記では、セッションにフラッシュメッセージのデータが保存されていた場合、JSON形式でVueコンポーネントに渡しています。
",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 25,
                'article_id' => 4,
                'chapter_number' => 4,
                'title' => 'FlashMessageコンポーネントを定義する',
                'content' => "**docker-laravel/backend/resources/js/components/FlashMessage.vue**
```vue.js
<template>
    <div>
        <transition appear>
            <div class=\"flash-message\" v-if=\"show\">
                {{flashMessage}}
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['flashMessage'],
        data() {
            return{
                // フラッシュメッセージの表示切り替え
                show: false
            }
        },
        methods: {
            // 指定した秒数経過後にメッセージを消す
            showFlashMessage: function() {
                // フラッシュメッセージを表示する
                this.show = true
                // ２秒後に非表示にする
                setTimeout(() => {
                        this.show = false}
                    ,2000
                )
            }
        },
        // DOMの生成前にshowFlashMessageメソッドを実行する
        created() {
            this.showFlashMessage()
        }
    }
</script>
<style scoped>
    // フラッシュメッセージ表示のアニメーション
    .v-leave-active,
    .v-enter-active {
        transition: opacity 1s;
    }
    .v-enter,
    .v-leave-to {
        opacity: 0;
    }
    // フラッシュメッセージのスタイル
    .flash-message {
    background-color: #fff;
    border: solid 1px #2f72d8;
    border-radius: 2px;
    color: #2f72d8;
    font-weight: bold;
    padding: 15px;
    text-align: center;
    position: fixed;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
}
</style>
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 26,
                'article_id' => 4,
                'chapter_number' => 5,
                'title' => 'まとめ',
                'content' => "これで会員登録が完了した時にメッセージが表示されるようになりました！\n
この方法ならスタイルだけ変えて使い回しやすいので、是非試してみて下さい。
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 27,
                'article_id' => 5,
                'chapter_number' => 1,
                'title' => 'フッターが固定されない例',
                'content' => "下記のようなCSSだと、中のコンテンツの高さがウィンドウよりも小さいと、フッターが上に上がってきてしまいます。
**HTMLファイル**
```html
<!DOCTYPE html>
<html>
<head>
    <title>フッター固定</title>
</head>
<body>
    <header>
        ヘッダー
    </header>

    <main>
        メインコンテンツ
    </main>

    <footer>
        フッター
    </footer>
</body>
</html>
```
**CSSファイル**
```css
body {
    margin: 0;
}

header {
    background: #333333;
    color: #ffffff;
    height: 50px;
}

main {
    background: #ffffff;
}

footer {
    background: #333333;
    color: #ffffff;
    height: 50px;
}
```
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 28,
                'article_id' => 5,
                'chapter_number' => 2,
                'title' => 'Flexboxでフッターを固定する',
                'content' => "bodyタグに下記のスタイルを追加します。
```css
display: flex;
flex-direction: column;
min-height: 100vh;
```
flexboxを設定して、columnで縦並びにしています。\n
そして\"min-height: 100vh\"とすることで、bodyの表示領域が確保されます。\n
\n
続いてmainタグに以下のスタイルを適用します。
```css
flex: 1 0 auto;
```
これを適用することで、bodyタグ内のheaderタグとfooterタグの高さを除いた部分が、mainタグで埋まるようになります。\n
以上の処理で、フッターが最下部に固定することができます。
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 29,
                'article_id' => 5,
                'chapter_number' => 3,
                'title' => '補足：IE対策',
                'content' => "上記の方法だと、IE環境でコンテンツに画像要素が存在した場合、フッターの上部に高さが残り余白が生まれてしまいます。\n
その場合、mainタグに\"min-height: 1px;\"を追加すると解消されます。\n
参考記事\n
(https://503dg.jp/blog/design/sticky-footer.html)
                ",
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],

        ]);


//        for($i = 9, $x = 40; $i < 19, $x < 50; $i++, $x++){
//            DB::table('childSteps')->insert([
//                'id' => $x,
//                'article_id' => $i,
//                'chapter_number' => 1,
//                'title' => 'サンプル',
//                'content' => "サンプルです。",
//                'time' => 10,
//                'created_at' => $faker->dateTimeBetween('-2 years','-1 years'),
//                'updated_at' => $faker->dateTimeBetween('-2 years','-1 years'),
//            ]);
//        }
    }
}
