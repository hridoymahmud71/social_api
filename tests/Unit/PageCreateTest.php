<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class PageCreateTest extends TestCase
{

    private $user;

    public function setUP(): void{
        parent::setUP();
        $this->user = User::inRandomOrder()->limit(1)->first();  
    }

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

 
        $this->actingAs($this->user);


        $this->json('POST', '/api/page/create', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPageCreateAuthenticatedWithValidData()
    {

        $data = ['page_name' => "A very good page name"];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        $this->actingAs($this->user);

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
