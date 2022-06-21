<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use App\Models\Page;
use App\Models\UserFollower;
class PagePostCreateTest extends TestCase
{
    private $user1;
    private $user2;
    private $faker;

    public function setUp(): void {

        parent::setUp();

        $this->user1 = User::inRandomOrder()->limit(1)->first();         
        $this->user2 = User::inRandomOrder()->limit(1)->where('id','!=',$this->user1->id)->first();   
        
        $this->faker = \Faker\Factory::create();           
    }

    public function testPagePostCreateUnAuthenticated()
    {

        $data = [];
        $header = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer "
        ];
      

        $page = Page::create([
            'name'        => "{$this->faker->word} {$this->faker->word} {$this->faker->word}",
            'user_id'     => $this->user1->id,
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

       
        $this->actingAs($this->user1);

        $page = Page::create([
            'name'        => "{$this->faker->word} {$this->faker->word} {$this->faker->word}",
            'user_id'     => $this->user1->id,
        ]);

        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testPagePostWithUnautorizedUserData()
    {

        $data = ['post_content' => $this->faker->text(rand(10,400))];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];

        $page = Page::create([
            'name'        => "{$this->faker->word} {$this->faker->word} {$this->faker->word}",
            'user_id'     => $this->user1->id,
        ]);

        $this->actingAs($this->user2);

        // user 2 is trying to post from user 1's page
        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
        ->assertStatus(401);
            
    }

    public function testPagePostCreateProperData()
    {

        $data = ['post_content' => $this->faker->text(rand(10,400))];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json',
        ];
 
        $this->actingAs($this->user1);

        $page = Page::create([
            'name'        => "{$this->faker->word} {$this->faker->word} {$this->faker->word}",
            'user_id'     => $this->user1->id,
        ]);

        $this->json('POST', "api/page/{$page->id}/attach-post", $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
            
    }
}
