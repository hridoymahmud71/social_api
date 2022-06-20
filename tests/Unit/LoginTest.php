<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testLognWithInvalidData()
    {

        $data = [];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST', '/api/auth/login', $data, $header)
            ->assertJsonFragment([
                'result'   => false,                               
            ]);   
    }

    public function testLoginWithUnRegisteredEmail()
    {

        $data = [
            "email" => "usernone@example.com",
            "password" => "123456",
        ];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST','/api/auth/login', $data, $header)
        ->assertJsonFragment([
            'result'   => false,                               
        ]);        
    }

    public function testLoginWithWrongPassword()
    {

        $data = [
            "email" => "user1@example.com",
            "password" => "111111",
        ];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST','/api/auth/login', $data, $header)
        ->assertJsonFragment([
            'result'   => false,                               
        ]);        
    }

    public function testLoginWithCorrectUserData()
    {

        $data = [
            "email" => "user1@example.com",
            "password" => "123456",
        ];
        $header = [
            'Accept' => '*/*',
            'Content-Type' => 'application/json'
        ];

        $this->json('POST','/api/auth/login', $data, $header)
        ->assertJsonFragment([
            'result'   => true,                               
        ]);        
    }
}
