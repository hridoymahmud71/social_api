<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'        => "User",
            'last_name'         => "One",
            'password'          => bcrypt("123456"),
            'email'             => "user1@example.com",
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);

        User::create([
            'first_name'        => "User",
            'last_name'         => "Two",
            'password'          => bcrypt("123456"),
            'email'             => "user2@example.com",
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);
        User::create([
            'first_name'        => "User",
            'last_name'         => "Three",
            'password'          => bcrypt("123456"),
            'email'             => "user3@example.com",
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);
        User::create([
            'first_name'        => "User",
            'last_name'         => "Four",
            'password'          => bcrypt("123456"),
            'email'             => "user4@example.com",
            'email_verified_at' => date("Y-m-d H:i:s"),
        ]);

        $number_of_users = 16; // 4+16=20 users
        $faker = \Faker\Factory::create();

        $user_count = 0;
        while ($user_count <= $number_of_users) {

            $fake_email = $faker->unique()->safeEmail;
            while (User::where('email', '=', $fake_email)->exists()) {
                $fake_email = $faker->unique()->safeEmail;
            }

            User::create([
                'first_name'        => $faker->firstName,
                'last_name'         => $faker->lastName,
                'password'          => bcrypt("123456"),
                'email'             => $fake_email,
                'email_verified_at' => date("Y-m-d H:i:s"),
            ]);

            $user_count++;
        }
    }
}
