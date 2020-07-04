<?php

use App\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ChildStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('childSteps')->delete();

        $faker = Faker::create('ja_JP');

        DB::table('childSteps')->insert([
            [
                'id' => 1,
                'step_id' => 1,
                'step_number' => 1,
                'title' => '環境構築①　PCを買う',
                'content' => 'メーカーはどこでも良いのですが、プログラミングに関する情報はMacを前提としていることが多いのでMacがおすすめです。',
                'time' => 3,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 2,
                'step_id' => 1,
                'step_number' => 2,
                'title' => '環境構築②　テキストエディタをダウンロードする',
                'content' => 'まずは無料のソフトをダウンロードしましょう。おすすめはSublime Textというエディタです。',
                'time' => 5,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 3,
                'step_id' => 1,
                'step_number' => 3,
                'title' => 'Progateを受講する',
                'content' => "Progateはゲーム感覚でプログラミングを学べるサービスです。\n受講するコースは、HTML・CSSとJavaScriptです。",
                'time' => 20,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 4,
                'step_id' => 1,
                'step_number' => 4,
                'title' => 'ドットインストールを受講する',
                'content' => "ドットインストールは動画でプログラミングを学ぶサービスです。\n受講するコースはProgateと同じく、HTML・CSSとJavaScriptです。",
                'time' => 30,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 5,
                'step_id' => 1,
                'step_number' => 5,
                'title' => '既存のランディングページを探す',
                'content' => "MUUUUU.ORGというランディングページを集めたサイトで、真似して制作するサイトを探しましょう。\nここで選ぶサイトは、できるだけ要素の重なりなどが無いシンプルな構図にしてください。",
                'time' => 4,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 6,
                'step_id' => 1,
                'step_number' => 6,
                'title' => '既存のランディングページを真似して制作する',
                'content' => "STEP５で選んだサイトを真似して制作してみましょう。\n基本的に構図はそのまま真似してよいですが、配色・画像・文章は自分で考えた方が実力UPにつながります。\nまたどうしても書き方が分からない場合のみ、デベロッパーツールで確認しましょう。",
                'time' => 60,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 7,
                'step_id' => 1,
                'step_number' => 7,
                'title' => 'クラウドソーシングサイトで仕事を受注する',
                'content' => "クラウドワークス・ランサーズ・ココナラなどのクラウドソーシングサイトでランディングページの仕事を受注してみましょう。\n募集数に対して応募数が多いので、初めは受注できないことがほとんどです。そのため数件応募するだけではなく、20件以上応募しましょう",
                'time' => 12,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 8,
                'step_id' => 2,
                'step_number' => 1,
                'title' => '書籍購入① 「これでわかる英文法中学1~3年―新学習指導要領対応 (中学これでわかる)」',
                'content' => '英語の基礎はこの本でバッチリです。',
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 9,
                'step_id' => 2,
                'step_number' => 2,
                'title' => '書籍購入② 「はじめて受けるTOEIC(R) L&Rテスト 全パート完全攻略」',
                'content' => 'TOEIC初学者の方にピッタリです。',
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 10,
                'step_id' => 2,
                'step_number' => 3,
                'title' => '書籍購入③ 「公式TOEIC　Listening　＆　Reading問題集（5)」',
                'content' => 'より実際の試験に近い問題集です。',
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 11,
                'step_id' => 2,
                'step_number' => 4,
                'title' => '③の書籍の模試を実施',
                'content' => '現時点での自分の実力を確認しましょう。',
                'time' => 10,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 12,
                'step_id' => 2,
                'step_number' => 5,
                'title' => '①と②の書籍で学習する',
                'content' => '約３ヶ月を目安に学習します。',
                'time' => 270,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 13,
                'step_id' => 2,
                'step_number' => 6,
                'title' => '③の書籍で学習する',
                'content' => "基礎ができたらあとは実践のみです。\n約２ヶ月間で２周することを目安に進めましょう。",
                'time' => 180,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 14,
                'step_id' => 3,
                'step_number' => 1,
                'title' => '証券会社のサイトで口座を開設する',
                'content' => 'SBI証券が使いやすくておすすめです。',
                'time' => 2,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 15,
                'step_id' => 3,
                'step_number' => 2,
                'title' => 'つみたてNISAに申し込む',
                'content' => 'つみたてNISAのページから申し込んでください。',
                'time' => 2,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 16,
                'step_id' => 3,
                'step_number' => 3,
                'title' => '投資信託を購入する',
                'content' => "実際に投資信託を購入します。\n「ニッセイ外国株式インデックスファンド」か「ｅＭＡＸＩＳ　Ｓｌｉｍ　全世界株式（除く日本）」が費用が安く、世界経済の成長を享受できるのでおすすめです。",
                'time' => 3,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 17,
                'step_id' => 3,
                'step_number' => 4,
                'title' => '積立コースを選択する',
                'content' => "毎月・毎週・毎日コースから選択します。\nおすすめは毎月コースで、給料日の次の日に設定しておくとお金を使ってしまう前に積み立てられます。\nまた、NISA投資可能枠を全て使いきるための「NISA枠ぎりぎり注文」も設定しておきましょう。",
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 18,
                'step_id' => 4,
                'step_number' => 1,
                'title' => '就業規則で退職を希望してから実際に退職できるまでの期間を確認',
                'content' => "企業によって退職を希望する旨を伝えてから実際に退職できるまでにかかる期間が異なります。\n３ヶ月前までに退職願いを提出する必要がある企業などもありますので、退職希望を伝える前に確認しておきましょう。",
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 19,
                'step_id' => 4,
                'step_number' => 2,
                'title' => '転職サイトに登録する',
                'content' => '転職サイトで気になる業界や給料・勤務時間などをチェックして、希望に見合う企業を探しましょう。',
                'time' => 12,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 20,
                'step_id' => 4,
                'step_number' => 3,
                'title' => '上司に退職の旨を伝える',
                'content' => "この時に自身の転職活動の状況や有給の残日数なども考慮して、いつ頃に退職したいかを相談してください。\nまた、企業によっては同時に退職願いの提出が必要になるので確認しておきましょう。",
                'time' => 2,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 21,
                'step_id' => 4,
                'step_number' => 4,
                'title' => '面接を受ける',
                'content' => "STEP3の退職の相談と同時並行で面接を受けます。\nもし退職日が決まっているなら、それも面接の際に伝えましょう。",
                'time' => 20,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 22,
                'step_id' => 4,
                'step_number' => 5,
                'title' => '仕事の引継ぎ',
                'content' => '後々トラブルを避けるためにも、自身が抱えている仕事を上司や同僚に全て引き継ぎます。',
                'time' => 20,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 23,
                'step_id' => 5,
                'step_number' => 1,
                'title' => '書籍で学ぶ',
                'content' => "単語：「DUO3.0」\n文法：「中学英語をもう一度ひとつひとつわかりやすく」\n文法：「基礎からの新々総合英語 (チャート式・シリーズ)」\nリスニング：「英語耳[改訂・新CD版] 発音ができるとリスニングができる」",
                'time' => 150,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 24,
                'step_id' => 5,
                'step_number' => 2,
                'title' => 'アプリで学ぶ',
                'content' => "リーディング：「英語リーディングアプリPOLYGLOTS（ポリグロッツ）」\nリスニング：「TEDICTライト」",
                'time' => 150,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 25,
                'step_id' => 5,
                'step_number' => 3,
                'title' => 'オンライン英会話スクールを受講する',
                'content' => "おすすめは「DMM英会話」です。",
                'time' => 200,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 26,
                'step_id' => 6,
                'step_number' => 1,
                'title' => '毎月美容院に行く',
                'content' => "床屋と比べると美容院は割高ですが、その分オシャレでカッコいいヘアースタイルになれます。",
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 27,
                'step_id' => 6,
                'step_number' => 2,
                'title' => '髭・眉毛・鼻毛の手入れを毎日行う',
                'content' => "男性の場合髭だけで十分と考える方もいますが、眉毛がボサボサだとどんなに髪をセットしてもサマになりません。\n必ず毎日手入れをしましょう。",
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 28,
                'step_id' => 6,
                'step_number' => 3,
                'title' => '口臭ケアをする',
                'content' => "常にブレスケアを持ち歩きましょう。\nまたクリアクリンなどの洗口液も持ち歩いておくと、時間が無くて歯を磨けない時に便利です。",
                'time' => 1,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 29,
                'step_id' => 6,
                'step_number' => 4,
                'title' => 'ブランド物の靴を買う',
                'content' => "オシャレは足元からです。長く使えるので多少奮発しても良い靴を選びましょう。\nおすすめのブランドはお金に余裕のある方は「リーガル」、あまりお金をかけられない方は「ロックポート」です。",
                'time' => 2,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 30,
                'step_id' => 6,
                'step_number' => 5,
                'title' => 'オーダーメイドスーツを買う',
                'content' => "最近はオンラインでもオーダースーツを買うことができます。\n自分の体に合ったスーツを着ましょう。\nおすすめのサイトは「Suit ya」です。",
                'time' => 6,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 31,
                'step_id' => 7,
                'step_number' => 1,
                'title' => '文法を書籍で学ぶ',
                'content' => "単語帳の場合日常ではあまり使わない単語が出てくるので、文法だけで良いと思います。\nおすすめは「ゼロからスタートスペイン語（文法編） だれにでもわかる文法と発音の基本ルール」です。",
                'time' => 100,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 32,
                'step_id' => 7,
                'step_number' => 2,
                'title' => 'YouTubeでリスニングする',
                'content' => "「ProfeDeELE.es」というチャンネルでは基礎の基礎まで網羅しているので、初心者の方にとてもおすすめです。",
                'time' => 60,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 33,
                'step_id' => 7,
                'step_number' => 3,
                'title' => 'スペイン語の映画を鑑賞する',
                'content' => "NetFlixで「スペイン映画」と検索をすると、数は少ないですがスペイン映画を見ることができます。\n実際に使われる文章や、会話スピードを実感できます。",
                'time' => 20,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 34,
                'step_id' => 7,
                'step_number' => 4,
                'title' => 'オンラインスクールを受講する',
                'content' => "「DMM英会話」では英語だけでなくスペイン語も受講できます。\n無料体験もあるので是非申し込んでみてください。",
                'time' => 120,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 35,
                'step_id' => 8,
                'step_number' => 1,
                'title' => 'コーディングを理解する①',
                'content' => "デザイナーが考えたデザイン案を基にエンジニアがコーディングをするため、デザイナーでもHTML・CSSの知識が必要になります。\n「スラスラわかるHTML&CSSの基本」と「HTML5&CSS3標準デザイン講座」という書籍でまずは基礎から学びましょう。",
                'time' => 20,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 36,
                'step_id' => 8,
                'step_number' => 2,
                'title' => 'コーディングを理解する②',
                'content' => "書籍の次はオンライン学習ツールでHTML・CSSを学びましょう。\n「Progate」と「ドットインストール」というサイトを使いましょう。\n併せて「Sublime Text」というコーディングするためのテキストエディタというツールもダウンロードしましょう。",
                'time' => 30,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 37,
                'step_id' => 8,
                'step_number' => 3,
                'title' => 'デザインツール「Photoshop」の基礎を学ぶ',
                'content' => "デザインツールには「illustrator」もありますが、Photoshopを採用している企業が圧倒的に多いです。\n「Udemy」というオンライン学習サービスで使い方の基礎を学びましょう。",
                'time' => 30,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 38,
                'step_id' => 8,
                'step_number' => 4,
                'title' => 'デザインの知識を得る',
                'content' => "まずは「ノンデザイナーズ・デザインブック」という書籍で、デザインとはどういうものなのかを理解しましょう。",
                'time' => 10,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 39,
                'step_id' => 8,
                'step_number' => 5,
                'title' => '既存サイトから学ぶ',
                'content' => "「I/O3000」というサイトにはたくさんのかっこいいサイトが掲載されています。\n当然ただ眺めているだけだと実力は身に付かないので、Photoshopを使ってそのサイトのデザインをそのまま写してみましょう。\nこれを何度も繰り返していけば、確実にデザイン力が身に付きます。",
                'time' => 30,
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
        ]);


        for($i = 9, $x = 40; $i < 19, $x < 50; $i++, $x++){
            DB::table('childSteps')->insert([
                'id' => $x,
                'step_id' => $i,
                'step_number' => 1,
                'title' => 'サンプル',
                'content' => "サンプルです。",
                'time' => 10,
                'created_at' => $faker->dateTimeBetween('-2 years','-1 years'),
                'updated_at' => $faker->dateTimeBetween('-2 years','-1 years'),
            ]);
        }
    }
}
