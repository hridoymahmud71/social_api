<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;


class RegistrationTest extends TestCase
{

    public function testSignupWithInvalidData()
    {

        $data = [];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];
        
        $this->json('POST', '/api/auth/register', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testSignupWithSmallPassword()
    {

        $data = [
            "name" => "User None",
            "email" => "user0@example.com",
            "password" => "123",
            "password_confirmation" => "1234"
        ];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST', '/api/auth/register', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testSignupWithDuplicateEmail()
    {

        $data = [
            "first_name" => "User",
            "last_name" => "One",
            "email" => "user1@example.com",
            "password" => "123456",
            "password_confirmation" => "123456"
        ];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST', '/api/auth/register', $data, $header)
            ->assertJsonFragment([
                'result'   => false,
            ]);
    }

    public function testSignupWithPerfectData()
    {
       
        $faker = \Faker\Factory::create();

        $fake_email = $faker->unique()->safeEmail;
        while (User::where('email', '=', $fake_email)->exists()) {
            $fake_email = $faker->unique()->safeEmail;
        }

        $data =   [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $fake_email,
            "password" => "123456",
            "password_confirmation" => "123456"
        ];


        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST', '/api/auth/register', $data, $header)
            ->assertJsonFragment([
                'result'   => true,
            ]);
    }
}
