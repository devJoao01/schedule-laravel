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

        $patientIds = \App\Models\Patient::pluck('id')->toArray();
        $doctorIds = \App\Models\Doctor::pluck('id')->toArray();
        
        for ($i = 0; $i < 10; $i++) { 
            WaitingList::create([
                'patient_id' => $faker->randomElement($patientIds),
                'doctor_id' => $faker->randomElement($doctorIds),
                'priority' => $faker->randomElement(['normal', 'urgent']), 
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'), 
                'created_at' => now(), 
                'updated_at' => now() 
            ]);
        }
    }
}
