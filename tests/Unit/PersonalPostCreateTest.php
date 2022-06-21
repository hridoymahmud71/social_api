<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;

class PersonalPostCreateTest extends TestCase
{

    private $user;
    private $faker;
    

    public function setUp(): void {

        parent::setUp();

        $this->user = User::inRandomOrder()->limit(1)->first(); 
        $this->faker = \Faker\Factory::create();         
    }

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

        $this->actingAs($this->user);


        $this->json('POST', 'api/person/attach-post', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPersonalPostCreateAuthenticatedWithValidData()
    {

        $data = ['post_content' => $this->faker->text(rand(10,400))];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        $this->actingAs($this->user);


        $this->json('POST', 'api/person/attach-post', $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
            
    }
}
