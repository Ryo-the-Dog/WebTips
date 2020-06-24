<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ChildStep;
use Faker\Generator as Faker;

$factory->define(ChildStep::class, function (Faker $faker) {
    return [
        'step_id' => $i,
        'step_number' => 1,
        'title' => 'サンプル',
        'content' => "サンプルです。",
        'created_at' => $faker->dateTimeBetween('-1 years','now'),
        'updated_at' => $faker->dateTimeBetween('-1 years','now'),
    ];
});
