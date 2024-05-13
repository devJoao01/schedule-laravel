<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
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
            Patient::create([
                'name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'dt_nas' => $faker->date($format = 'Y-m-d', $max = 'now'), // Gera uma data de nascimento aleatória
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
