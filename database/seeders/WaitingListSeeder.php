<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WaitingList;
use Faker\Factory as Faker;

class WaitingListSeeder extends Seeder
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
            WaitingList::create([
                'patient_id' => $faker->numberBetween(1, 100), 
                'doctor_id' => $faker->numberBetween(1, 50),
                'priority' => $faker->randomElement(['normal', 'urgent']), 
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'created_at' => now(), 
                'updated_at' => now() 
            ]);
        }
    }
}
