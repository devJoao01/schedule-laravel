<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
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
            Appointment::create([
                'patient_id' => $faker->numberBetween(1, 100), 
                'schedule_id' => $faker->numberBetween(1, 50), 
                'created_at' => $faker->dateTimeThisMonth(), 
                'updated_at' => $faker->dateTimeThisMonth() 
            ]);
        }
    }
}
