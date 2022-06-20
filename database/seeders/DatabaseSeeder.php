<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        // \App\Models\User::factory(10)->create();
    }
}
