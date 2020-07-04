<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chapter;
use Faker\Generator as Faker;

$factory->define(Chapter::class, function (Faker $faker) {
    return [
        'step_id' => $i,
        'step_number' => 1,
        'title' => 'サンプル',
        'content' => "サンプルです。",
        'created_at' => $faker->dateTimeBetween('-1 years','now'),
        'updated_at' => $faker->dateTimeBetween('-1 years','now'),
    ];
});
