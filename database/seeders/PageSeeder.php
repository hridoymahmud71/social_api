<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $faker = \Faker\Factory::create();


        foreach ($users as $user) {
            $num_of_pages = rand(2,10);

            $page_count = 0;
            while($page_count <= $num_of_pages){
                
                Page::create([
                    'name'        => "{$faker->word} {$faker->word} {$faker->word}",
                    'user_id'     => $user->id,
                ]);
                $page_count ++ ;
            }
        }

    }
}
