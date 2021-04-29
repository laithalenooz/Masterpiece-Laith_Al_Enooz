<?php

use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i <= 50; $i++)
        {
            \App\Clinic::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'speciality' => $faker->colorName,
                'mobile' => $faker->numberBetween(0,10),
                'password' => bcrypt('password'),
            ]);
        }
    }
}
