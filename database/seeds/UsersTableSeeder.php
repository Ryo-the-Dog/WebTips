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
                'email' => 'yusuke@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584410/user_sample_1_gcpoao.jpg',
                'introduce' => "都内でエンジニアをしています。\n主にプログラミングに関するSTEPを投稿します。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Jonny',
                'email' => 'jonny@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_2_u9wbpz.jpg',
                'introduce' => "中学校で英語を教えてます。\nみなさんの英語学習をサポートしたいです！",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => '高橋 浩之',
                'email' => 'hiroyuki@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_3_jyfs8z.jpg',
                'introduce' => "ビジネスやマネー関連の知識を投稿しています。\nよろしくお願いします！",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => '綾乃',
                'email' => 'ayano@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584405/user_sample_4_edwyup.jpg',
                'introduce' => "過去に６回の転職経験があります。\n面接のコツや転職活動に必要な知識を投稿しています。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'ミキ',
                'email' => 'miki@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584407/user_sample_5_xoojku.jpg',
                'introduce' => "英語とスペイン語が得意です。\nよろしくお願いします！",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => '木下 由香',
                'email' => 'yuka@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
                'user_img' => 'https://res.cloudinary.com/djix7zcpk/image/upload/v1588584409/user_sample_6_j4okml.jpg',
                'introduce' => "フリーランスのwebデザイナーです。\nデザインが苦手な方は是非私のSTEPを実践してみてください。",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
