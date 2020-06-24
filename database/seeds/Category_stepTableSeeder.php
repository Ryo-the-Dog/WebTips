<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Category_stepTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_step')->delete();

        DB::table('category_step')->insert([
            [
                'category_id' => 6,
                'step_id' => 1,
            ],
            [
                'category_id' => 7,
                'step_id' => 1,
            ],
            [
                'category_id' => 10,
                'step_id' => 1,
            ],
            [
                'category_id' => 1,
                'step_id' => 2,
            ],
            [
                'category_id' => 2,
                'step_id' => 2,
            ],
            [
                'category_id' => 8,
                'step_id' => 3,
            ],
            [
                'category_id' => 9,
                'step_id' => 4,
            ],
            [
                'category_id' => 1,
                'step_id' => 5,
            ],
            [
                'category_id' => 2,
                'step_id' => 5,
            ],
            [
                'category_id' => 9,
                'step_id' => 6,
            ],
            [
                'category_id' => 1,
                'step_id' => 7,
            ],
            [
                'category_id' => 6,
                'step_id' => 8,
            ],
        ]);

        $faker = Faker::create('ja_JP');

        for($i = 9; $i < 19; $i++){
            DB::table('category_step')->insert([
                'category_id' => $faker->numberBetween($min=1, $max=10),
                'step_id' => $i,
            ]);
        }

    }
}
