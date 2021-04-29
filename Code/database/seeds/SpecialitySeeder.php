<?php

use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i <= 30; $i++)
        {
            \App\Speciality::create([
                'speciality' => $faker->name,
            ]);
        }
    }
}
