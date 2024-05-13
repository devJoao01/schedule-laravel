<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use Faker\Factory as Faker; 

class DoctorSeeder extends Seeder
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
            Doctor::create([
                'name' => $faker->name, 
                'specialty' => $faker->jobTitle, 
                'work_schedule' => $faker->dateTimeThisMonth(), 
                'contact' => $faker->phoneNumber, 
                'created_at' => now(),
                'updated_at' => now() 
            ]);
        }
    }
}
