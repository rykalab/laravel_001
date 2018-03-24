<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
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
            $comment = new \App\Comment();
            $comment->author = $faker->name;
            $comment->content = $faker->sentence(50);
            $comment->save();
        }
    }
}
