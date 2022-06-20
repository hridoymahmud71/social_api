<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use App\Models\Page;

class PagePostCreateTest extends TestCase
{
    public function testPagePostCreateUnAuthenticated()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();

        $page = Page::create([
            'name'        => "User 1's x page",
            'user_id'     => $user->id,
        ]);

        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
            ->assertStatus(401);
    }

    public function testPagePostCreateAuthenticatedWithInvalidData()
    {

        $data = [];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);

        $page = Page::create([
            'name'        => "User 1's y page",
            'user_id'     => $user->id,
        ]);

        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPagePostWithUnautorizedUserData()
    {

        $data = ['post_content' => "This is a test post content"];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        $user1 = User::where('email', '=', 'user1@example.com')->first();

        $page = Page::create([
            'name'        => "User 1's dummy page",
            'user_id'     => $user1->id,
        ]);

        $user2 = User::where('email', '=', 'user2@example.com')->first();
        $this->actingAs($user2);

        // user 2 is trying to post from user 1's page
        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
        ->assertStatus(401);
            
    }

    public function testPagePostCreateProperData()
    {

        $data = ['post_content' => "This is a test post content"];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);

        $page = Page::create([
            'name'        => "User 1's good page",
            'user_id'     => $user->id,
        ]);

        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
            
    }
}
