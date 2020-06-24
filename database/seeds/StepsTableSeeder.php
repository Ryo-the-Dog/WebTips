<?php

use App\Step;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->delete();

        $faker = Faker::create('ja_JP');

        DB::table('steps')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title' => '最短でweb制作でお金を稼ぐ！',
                'time' => 140,
                'description' => "最短でweb制作でお金を稼ぐまでのステップです。\n稼げるようになるまでの難易度が比較的低いとされる、ランディングページを制作できるようになる方法です。",
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_1_jju4vo.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'title' => 'TOEIC初学者が一発で700点取る方法',
                'time' => 500,
                'description' => '一発でTOEIC700点取れる方法です。',
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584403/step_sample_2_s4qayp.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'title' => '投資の始め方',
                'time' => 8,
                'description' => '今話題のつみたてNISAで投資を始めるまでのステップです。',
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_3_c4ifrn.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'title' => '転職に必要なこと',
                'time' => 60,
                'description' => '転職をするまでに必要なことです。',
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_4_yf076a.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 5,
                'user_id' => 2,
                'title' => '留学せずに英語の日常会話をマスターしよう',
                'time' => 500,
                'description' => "英語を勉強したはずなのに、いざとなると全然話せないという方は多いと思います。\n最低限英語を話せるようになるまでの最短ステップです！",
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_5_j3suzp.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 6,
                'user_id' => 3,
                'title' => 'できるビジネスマンになろう！',
                'time' => 12,
                'description' => "カッコいいビジネスマンになるための秘訣をお教えします。\n職場での信頼感が上がること間違い無しです！",
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584404/step_sample_6_jbm79c.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 7,
                'user_id' => 5,
                'title' => 'スペイン語初級講座',
                'time' => 300,
                'description' => "現在中国語、英語に続いて使っている人の多い言語がスペイン語です。\nこれからもスペイン語を使う人は増えていくので、この機会に是非勉強してみてください！",
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584406/step_sample_7_gevlcs.jpg',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
            [
                'id' => 8,
                'user_id' => 6,
                'title' => 'webデザインを学ぼう！',
                'time' => 120,
                'description' => 'webデザイナーではないけれど、デザインの力を身に付けたいという方におすすめです。',
                'step_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/step_sample_8_f7vx8e.png',
                'created_at' => $faker->dateTimeBetween('-1 years','now'),
                'updated_at' => $faker->dateTimeBetween('-1 years','now'),
            ],
        ]);

        for($i = 9; $i < 19; $i++){
            DB::table('steps')->insert([
                'id' => $i,
                'user_id' => $faker->numberBetween($min=1, $max=6),
                'title' => 'テスト用サンプルデータ',
                'time' => 10,
                'description' => 'テスト用のサンプルデータです。',
                'created_at' => $faker->dateTimeBetween('-2 years','-1 years'),
                'updated_at' => $faker->dateTimeBetween('-2 years','-1 years'),
            ]);
        }

        //factoryを利用
//        factory(Step::class, 10)->create();

    }
}
