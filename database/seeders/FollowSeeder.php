<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;
use App\Models\PageFollower;
use App\Models\UserFollower;

class FollowSeeder extends Seeder
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
            
            $do_follow_user = rand(1,100) > 50; 
            $do_follow_page = rand(1,100) > 60; 

            $user_follow_limit =  $do_follow_user ? rand(1,10) : 0;
            $page_follow_limit =  $do_follow_page ? rand(1,5) : 0;
          
            $other_users = User::inRandomOrder()->limit($user_follow_limit)->where('id','!=',$user->id)->get()->pluck('id')->toArray();
            $other_users_pages = Page::inRandomOrder()->limit($page_follow_limit)->where('user_id','!=',$user->id)->get()->pluck('id')->toArray();

            $user_follows = [];
            $user_page_follows = [];

            foreach($other_users as $other_user){
                $user_follows[] = ['follower_id'=> $user->id, 'following_id' =>  $other_user];
            }

            if(!empty($user_follows) && $do_follow_user){
                UserFollower::insert($user_follows);
            }

            foreach($other_users_pages as $other_users_page){
                $user_page_follows[] = ['follower_id'=> $user->id, 'page_id' =>  $other_users_page];
            }

            if(!empty($user_follows && $do_follow_page)){
                PageFollower::insert($user_page_follows);
            }
        }
    }
}
