<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('pl_PL');

        for ($i=0; $i < 200; $i++) {
            $article = new \App\Article();
            $article->title = $faker->name;
            $article->body = $faker->sentence(50);
            $article->save();
        }
    }
}
