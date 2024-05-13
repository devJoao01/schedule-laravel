<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserSystem;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as Faker;

class UserSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { 
            UserSystem::create([
                'user_name' => $faker->userName,
                'password' => Hash::make($faker->password), 
                'user_level' => $faker->randomElement(['admin', 'user']), 
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
