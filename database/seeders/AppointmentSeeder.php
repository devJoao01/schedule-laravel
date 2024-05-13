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

        $patientIds = \App\Models\Patient::pluck('id')->toArray();
        $scheduleIds = \App\Models\Schedule::pluck('id')->toArray();
       
        for ($i = 0; $i < 10; $i++) {
            Appointment::create([
                'patient_id' => $faker->randomElement($patientIds),
                'schedule_id' => $faker->randomElement($scheduleIds),
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth()
            ]);
        }
    }
}
