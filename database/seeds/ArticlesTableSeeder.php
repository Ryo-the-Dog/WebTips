<?php

use App\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();

        $faker = Faker::create('ja_JP');

        DB::table('articles')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title' => "Macの環境構築を自動化！",
                'description' => "面倒なMacの環境構築を自動化する方法です。",
                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_1_jju4vo.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'title' => "vue-cliでVue.jsの環境構築",
                'description' => "vue-cliとはコマンドラインを使ってvue.jsで開発を行うための事前準備を手助けしてくれるツールです。
Vue.jsを使用するには通常、gulpやbabel、webpackなどのビルドツールのインストールと設定が必要になります。ですが、vue-cliを使えばそういった面倒な設定が必要無くなるため、初心者の方でも簡単にVue.jsを始められます！
                ",
                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584403/step_sample_2_s4qayp.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
//            [
//                'id' => 3,
//                'user_id' => 3,
//                'title' => 'Laravel&',
//                'time' => 8,
//                'description' => '今話題のつみたてNISAで投資を始めるまでのステップです。',
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_3_c4ifrn.jpg',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 4,
//                'user_id' => 4,
//                'title' => '転職に必要なこと',
//                'time' => 60,
//                'description' => '転職をするまでに必要なことです。',
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_4_yf076a.jpg',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 5,
//                'user_id' => 2,
//                'title' => '留学せずに英語の日常会話をマスターしよう',
//                'time' => 500,
//                'description' => "英語を勉強したはずなのに、いざとなると全然話せないという方は多いと思います。\n最低限英語を話せるようになるまでの最短ステップです！",
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_5_j3suzp.jpg',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 6,
//                'user_id' => 3,
//                'title' => 'できるビジネスマンになろう！',
//                'time' => 12,
//                'description' => "カッコいいビジネスマンになるための秘訣をお教えします。\n職場での信頼感が上がること間違い無しです！",
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_6_jbm79c.jpg',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 7,
//                'user_id' => 5,
//                'title' => 'スペイン語初級講座',
//                'time' => 300,
//                'description' => "現在中国語、英語に続いて使っている人の多い言語がスペイン語です。\nこれからもスペイン語を使う人は増えていくので、この機会に是非勉強してみてください！",
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584406/step_sample_7_gevlcs.jpg',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
//            [
//                'id' => 8,
//                'user_id' => 6,
//                'title' => 'webデザインを学ぼう！',
//                'time' => 120,
//                'description' => 'webデザイナーではないけれど、デザインの力を身に付けたいという方におすすめです。',
//                'article_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_8_f7vx8e.png',
//                'created_at' => $faker->dateTimeBetween('-1 years','now'),
//                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
//            ],
        ]);
//
//        for($i = 9; $i < 19; $i++){
//            DB::table('articles')->insert([
//                'id' => $i,
//                'user_id' => $faker->numberBetween($min=1, $max=6),
//                'title' => 'テスト用サンプルデータ',
//                'time' => 10,
//                'description' => 'テスト用のサンプルデータです。',
//                'created_at' => $faker->dateTimeBetween('-2 years','-1 years'),
//                'updated_at' => $faker->dateTimeBetween('-2 years','-1 years'),
//            ]);
//        }

        //factoryを利用
//        factory(Article::class, 10)->create();

    }
}
