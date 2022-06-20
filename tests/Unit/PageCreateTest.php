<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class PageCreateTest extends TestCase
{
    public function testPageCreateUnAuthenticated()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];

        $this->json('POST', '/api/page/create', $data, $header)
            ->assertStatus(401);
    }

    public function testPageCreateAuthenticatedWithInvalidData()
    {

        $data = [];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);


        $this->json('POST', '/api/page/create', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPageCreateAuthenticatedWithValidData()
    {

        $data = ['name' => "A very good page name"];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        // make sure you have this user
        $user = User::where('email', '=', 'user1@example.com')->first();
        $this->actingAs($user);


        $this->json('POST', '/api/page/create', $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ])
            ->assertJsonStructure(
                [
                    'result',
                    'page' =>
                    [   'id',
                        'name',
                        'creator',                       
                    ]
                ]
            );
    }
}
