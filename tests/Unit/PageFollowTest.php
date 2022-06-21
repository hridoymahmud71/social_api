<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\PageFollower;
use App\Models\Page;

class PageFollowTest extends TestCase
{
    private $user1;
    private $unfollowed_page;


    public function setUp(): void
    {

        parent::setUp();

        $this->user1 = User::inRandomOrder()->limit(1)->first();

        // find a user 2 that is not ownded or followed by user 1
        $this->unfollowed_page = Page::inRandomOrder()->limit(1)->where('user_id', '!=', $this->user1->id)->first();
        while (PageFollower::where('follower_id',  $this->user1->id)->where('page_id', $this->unfollowed_page->id)->exists()) {
            $this->unfollowed_page = Page::inRandomOrder()->limit(1)->where('user_id', '!=', $this->user1->id)->first();
        }
    }

    public function testUserFollowUnAuthenticated()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];



        $this->json('POST', "api/follow/page/{$this->unfollowed_page->id}", $data, $header)
            ->assertStatus(401);
    }

    public function testUserFollowAlreadyFollowed()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        $this->actingAs($this->user1);

        $this->user1->pages_following()->attach($this->unfollowed_page);

        $this->json('POST', "api/follow/person/{$this->unfollowed_page->id}", $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testUserFollowNonExistentUser()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        $this->actingAs($this->user1);


        $this->json('POST', "api/follow/page/0", $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testUserFollowValid()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        $this->actingAs($this->user1);        

        $this->json('POST', "api/follow/page/{$this->unfollowed_page->id}", $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
    }
}
