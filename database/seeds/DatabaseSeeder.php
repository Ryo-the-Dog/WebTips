<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StepsTableSeeder::class);
        $this->call(Category_stepTableSeeder::class);
        $this->call(ChildStepsTableSeeder::class);
    }
}
