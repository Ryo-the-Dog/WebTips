<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Article_categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_category')->delete();

        DB::table('article_category')->insert([
            [
                'article_id' => 1,
                'category_id' => 19,
            ],
            [
                'article_id' => 2,
                'category_id' => 8,
            ],
            [
                'article_id' => 3,
                'category_id' => 8,
            ],
            [
                'category_id' => 3,
                'article_id' => 12,
            ],
            [
                'article_id' => 4,
                'category_id' => 8,
            ],
            [
                'category_id' => 4,
                'article_id' => 12,
            ],
            [
                'category_id' => 5,
                'article_id' => 1,
            ],

        ]);

//        $faker = Faker::create('ja_JP');
//
//        for($i = 9; $i < 19; $i++){
//            DB::table('article_category')->insert([
//                'category_id' => $faker->numberBetween($min=1, $max=10),
//                'article_id' => $i,
//            ]);
//        }

    }
}
