<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => Hash::make('password'),
                'user_level' => $faker->randomElement(['admin', 'user','patient']),
            ]);
        }
    }
}
