<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientTableSeeder extends Seeder
{
    public function run()
    {
      $faker = Faker::create();
          foreach (range(1,100) as $index) {
              DB::table('patients')->insert([
                  'firstName'   => $faker->firstName,
                  'lasttName'   => $faker->lastName,
                  'birthDate'   => $faker->date,
                  'gender'      => $faker->randomElement(['homme' ,'femelle']),
                  'profession'  => $faker->randomElement(['doctor' ,'developer', 'entrepeneur']),
                  'addresse'    => $faker->streetAddress,
                  'phoneNumber' => $faker->e164PhoneNumber,
                  'sentBy'      => $faker->name,
              ]);
          }
    }
}
