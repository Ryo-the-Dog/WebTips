<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min=1, $max=6),
        'title' => 'テスト用サンプルデータ',
        'time' => $faker->numberBetween($min=1,$max=36),
        'description' => 'テスト用のサンプルデータです。',
        'created_at' => $faker->dateTimeBetween('-1 years','now'),
        'updated_at' => $faker->dateTimeBetween('-1 years','now'),
    ];
});
