<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $pages = Page::all();
        $faker = \Faker\Factory::create();


        foreach ($users as $user) {
            $num_of_posts = rand(0,5);

            $post_count = 0;
            while($post_count <= $num_of_posts){
                $text_length  = rand(10,400);
                $user->posts()->create([
                    'content' =>  $faker->text($text_length),
                ]);
                $post_count ++ ;
            }
        }

        foreach ($pages as $page) {
            $num_of_posts = rand(0,5);

            $post_count = 0;
            while($post_count <= $num_of_posts){
                $text_length  = rand(10,400);
                $page->posts()->create([
                    'content' =>  $faker->text($text_length),
                ]);
                $post_count ++ ;
            }
        }
    }
}
