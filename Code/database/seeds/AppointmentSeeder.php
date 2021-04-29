<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i <= 35; $i++)
        {
            \App\Appointment::create([
                'user_id' => $faker->numberBetween(1,50),
                'clinic_id' => $faker->numberBetween(1,50),
                'time' => $faker->time('H:i'),
                'date' => $faker->date('M d, Y'),
            ]);
        }
    }
}
