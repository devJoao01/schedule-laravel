<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
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
            Schedule::create([
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'time' => $faker->time($format = 'H:i:s'), 
                'status' => $faker->numberBetween(0, 1), 
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
