<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserFollower;

class UserFollowTest extends TestCase
{
    private $user1;
    private $user2;


    public function setUp(): void
    {

        parent::setUp();

        $this->user1 = User::inRandomOrder()->limit(1)->first();
        // find a user 2 that is not following by user 1
        $this->user2 = User::inRandomOrder()->limit(1)->where('id', '!=', $this->user1->id)->first();
        while (UserFollower::where('follower_id',  $this->user1->id)->where('following_id', $this->user2)->exists()) {
            $this->user2 = User::inRandomOrder()->limit(1)->where('id', '!=', $this->user1->id)->first();
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



        $this->json('POST', "api/follow/person/{$this->user2->id}", $data, $header)
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

        $this->user1->following()->attach($this->user2);

        $this->json('POST', "api/follow/person/{$this->user2->id}", $data, $header)
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


        $this->json('POST', "api/follow/person/0", $data, $header)
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

        // while (UserFollower::where('follower_id',  $this->user1->id)->where('following_id', $this->user2)->exists()) {
        //     $this->user2 = User::inRandomOrder()->limit(1)->where('id', '!=', $this->user1->id)->first();
        // }

        $this->json('POST', "api/follow/person/{$this->user2->id}", $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
    }
}
