<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class PersonalPostCreateTest extends TestCase
{
    public function testPersonalPostCreateUnAuthenticated()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        $this->json('POST', 'api/person/attach-post', $data, $header)
            ->assertStatus(401);
    }

    public function testPersonalPostCreateAuthenticatedWithInvalidData()
    {

        $data = [];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);


        $this->json('POST', 'api/person/attach-post', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPersonalPostCreateAuthenticatedWithValidData()
    {

        $data = ['post_content' => "This is a test post content"];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);


        $this->json('POST', 'api/person/attach-post', $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
            
    }
}
