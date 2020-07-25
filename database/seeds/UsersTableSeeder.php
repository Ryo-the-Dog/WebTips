<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'ユースケ',
                'email' => 'yusuke@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584410/user_sample_1_gcpoao.jpg',
                'introduce' => "都内でエンジニアをしています。\n主にプログラミング全般を投稿します。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Jonny',
                'email' => 'jonny@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_2_u9wbpz.jpg',
                'introduce' => "Vue.jsやReactに関する記事をメインに投稿しています。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => '高橋 浩之',
                'email' => 'hiroyuki@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_3_jyfs8z.jpg',
                'introduce' => "フロントエンドエンジニアです。\n業務では主にVue.jsを使っています。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => '綾乃',
                'email' => 'ayano@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/user_sample_4_edwyup.jpg',
                'introduce' => "都内のweb制作会社で勤務しています。\nHTMLやCSSが得意です。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'ミキ',
                'email' => 'miki@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_5_xoojku.jpg',
                'introduce' => "バックエンドエンジニアです。PHPとLaravelが得意です！",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => '木下 由香',
                'email' => 'yuka@test.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_6_j4okml.jpg',
                'introduce' => "フリーランスのwebデザイナーです。\nデザイン初心者の方に向けた記事を投稿しています。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
