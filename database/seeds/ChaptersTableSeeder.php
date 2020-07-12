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
//            [
//                'id' => 13,
//                'article_id' => 2,
//                'chapter_number' => 6,
//                'title' => '③の書籍で学習する',
//                'content' => "基礎ができたらあとは実践のみです。\n約２ヶ月間で２周することを目安に進めましょう。",
//                'time' => 180,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 14,
//                'article_id' => 3,
//                'chapter_number' => 1,
//                'title' => '証券会社のサイトで口座を開設する',
//                'content' => 'SBI証券が使いやすくておすすめです。',
//                'time' => 2,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 15,
//                'article_id' => 3,
//                'chapter_number' => 2,
//                'title' => 'つみたてNISAに申し込む',
//                'content' => 'つみたてNISAのページから申し込んでください。',
//                'time' => 2,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 16,
//                'article_id' => 3,
//                'chapter_number' => 3,
//                'title' => '投資信託を購入する',
//                'content' => "実際に投資信託を購入します。\n「ニッセイ外国株式インデックスファンド」か「ｅＭＡＸＩＳ　Ｓｌｉｍ　全世界株式（除く日本）」が費用が安く、世界経済の成長を享受できるのでおすすめです。",
//                'time' => 3,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 17,
//                'article_id' => 3,
//                'chapter_number' => 4,
//                'title' => '積立コースを選択する',
//                'content' => "毎月・毎週・毎日コースから選択します。\nおすすめは毎月コースで、給料日の次の日に設定しておくとお金を使ってしまう前に積み立てられます。\nまた、NISA投資可能枠を全て使いきるための「NISA枠ぎりぎり注文」も設定しておきましょう。",
//                'time' => 1,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 18,
//                'article_id' => 4,
//                'chapter_number' => 1,
//                'title' => '就業規則で退職を希望してから実際に退職できるまでの期間を確認',
//                'content' => "企業によって退職を希望する旨を伝えてから実際に退職できるまでにかかる期間が異なります。\n３ヶ月前までに退職願いを提出する必要がある企業などもありますので、退職希望を伝える前に確認しておきましょう。",
//                'time' => 1,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 19,
//                'article_id' => 4,
//                'chapter_number' => 2,
//                'title' => '転職サイトに登録する',
//                'content' => '転職サイトで気になる業界や給料・勤務時間などをチェックして、希望に見合う企業を探しましょう。',
//                'time' => 12,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 20,
//                'article_id' => 4,
//                'chapter_number' => 3,
//                'title' => '上司に退職の旨を伝える',
//                'content' => "この時に自身の転職活動の状況や有給の残日数なども考慮して、いつ頃に退職したいかを相談してください。\nまた、企業によっては同時に退職願いの提出が必要になるので確認しておきましょう。",
//                'time' => 2,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 21,
//                'article_id' => 4,
//                'chapter_number' => 4,
//                'title' => '面接を受ける',
//                'content' => "STEP3の退職の相談と同時並行で面接を受けます。\nもし退職日が決まっているなら、それも面接の際に伝えましょう。",
//                'time' => 20,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 22,
//                'article_id' => 4,
//                'chapter_number' => 5,
//                'title' => '仕事の引継ぎ',
//                'content' => '後々トラブルを避けるためにも、自身が抱えている仕事を上司や同僚に全て引き継ぎます。',
//                'time' => 20,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 23,
//                'article_id' => 5,
//                'chapter_number' => 1,
//                'title' => '書籍で学ぶ',
//                'content' => "単語：「DUO3.0」\n文法：「中学英語をもう一度ひとつひとつわかりやすく」\n文法：「基礎からの新々総合英語 (チャート式・シリーズ)」\nリスニング：「英語耳[改訂・新CD版] 発音ができるとリスニングができる」",
//                'time' => 150,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 24,
//                'article_id' => 5,
//                'chapter_number' => 2,
//                'title' => 'アプリで学ぶ',
//                'content' => "リーディング：「英語リーディングアプリPOLYGLOTS（ポリグロッツ）」\nリスニング：「TEDICTライト」",
//                'time' => 150,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 25,
//                'article_id' => 5,
//                'chapter_number' => 3,
//                'title' => 'オンライン英会話スクールを受講する',
//                'content' => "おすすめは「DMM英会話」です。",
//                'time' => 200,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 26,
//                'article_id' => 6,
//                'chapter_number' => 1,
//                'title' => '毎月美容院に行く',
//                'content' => "床屋と比べると美容院は割高ですが、その分オシャレでカッコいいヘアースタイルになれます。",
//                'time' => 1,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 27,
//                'article_id' => 6,
//                'chapter_number' => 2,
//                'title' => '髭・眉毛・鼻毛の手入れを毎日行う',
//                'content' => "男性の場合髭だけで十分と考える方もいますが、眉毛がボサボサだとどんなに髪をセットしてもサマになりません。\n必ず毎日手入れをしましょう。",
//                'time' => 1,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 28,
//                'article_id' => 6,
//                'chapter_number' => 3,
//                'title' => '口臭ケアをする',
//                'content' => "常にブレスケアを持ち歩きましょう。\nまたクリアクリンなどの洗口液も持ち歩いておくと、時間が無くて歯を磨けない時に便利です。",
//                'time' => 1,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 29,
//                'article_id' => 6,
//                'chapter_number' => 4,
//                'title' => 'ブランド物の靴を買う',
//                'content' => "オシャレは足元からです。長く使えるので多少奮発しても良い靴を選びましょう。\nおすすめのブランドはお金に余裕のある方は「リーガル」、あまりお金をかけられない方は「ロックポート」です。",
//                'time' => 2,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 30,
//                'article_id' => 6,
//                'chapter_number' => 5,
//                'title' => 'オーダーメイドスーツを買う',
//                'content' => "最近はオンラインでもオーダースーツを買うことができます。\n自分の体に合ったスーツを着ましょう。\nおすすめのサイトは「Suit ya」です。",
//                'time' => 6,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 31,
//                'article_id' => 7,
//                'chapter_number' => 1,
//                'title' => '文法を書籍で学ぶ',
//                'content' => "単語帳の場合日常ではあまり使わない単語が出てくるので、文法だけで良いと思います。\nおすすめは「ゼロからスタートスペイン語（文法編） だれにでもわかる文法と発音の基本ルール」です。",
//                'time' => 100,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 32,
//                'article_id' => 7,
//                'chapter_number' => 2,
//                'title' => 'YouTubeでリスニングする',
//                'content' => "「ProfeDeELE.es」というチャンネルでは基礎の基礎まで網羅しているので、初心者の方にとてもおすすめです。",
//                'time' => 60,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 33,
//                'article_id' => 7,
//                'chapter_number' => 3,
//                'title' => 'スペイン語の映画を鑑賞する',
//                'content' => "NetFlixで「スペイン映画」と検索をすると、数は少ないですがスペイン映画を見ることができます。\n実際に使われる文章や、会話スピードを実感できます。",
//                'time' => 20,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 34,
//                'article_id' => 7,
//                'chapter_number' => 4,
//                'title' => 'オンラインスクールを受講する',
//                'content' => "「DMM英会話」では英語だけでなくスペイン語も受講できます。\n無料体験もあるので是非申し込んでみてください。",
//                'time' => 120,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 35,
//                'article_id' => 8,
//                'chapter_number' => 1,
//                'title' => 'コーディングを理解する①',
//                'content' => "デザイナーが考えたデザイン案を基にエンジニアがコーディングをするため、デザイナーでもHTML・CSSの知識が必要になります。\n「スラスラわかるHTML&CSSの基本」と「HTML5&CSS3標準デザイン講座」という書籍でまずは基礎から学びましょう。",
//                'time' => 20,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 36,
//                'article_id' => 8,
//                'chapter_number' => 2,
//                'title' => 'コーディングを理解する②',
//                'content' => "書籍の次はオンライン学習ツールでHTML・CSSを学びましょう。\n「Progate」と「ドットインストール」というサイトを使いましょう。\n併せて「Sublime Text」というコーディングするためのテキストエディタというツールもダウンロードしましょう。",
//                'time' => 30,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 37,
//                'article_id' => 8,
//                'chapter_number' => 3,
//                'title' => 'デザインツール「Photoshop」の基礎を学ぶ',
//                'content' => "デザインツールには「illustrator」もありますが、Photoshopを採用している企業が圧倒的に多いです。\n「Udemy」というオンライン学習サービスで使い方の基礎を学びましょう。",
//                'time' => 30,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 38,
//                'article_id' => 8,
//                'chapter_number' => 4,
//                'title' => 'デザインの知識を得る',
//                'content' => "まずは「ノンデザイナーズ・デザインブック」という書籍で、デザインとはどういうものなのかを理解しましょう。",
//                'time' => 10,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 39,
//                'article_id' => 8,
//                'chapter_number' => 5,
//                'title' => '既存サイトから学ぶ',
//                'content' => "「I/O3000」というサイトにはたくさんのかっこいいサイトが掲載されています。\n当然ただ眺めているだけだと実力は身に付かないので、Photoshopを使ってそのサイトのデザインをそのまま写してみましょう。\nこれを何度も繰り返していけば、確実にデザイン力が身に付きます。",
//                'time' => 30,
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
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
