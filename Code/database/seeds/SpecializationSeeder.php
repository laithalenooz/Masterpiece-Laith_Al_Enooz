<?php

use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i=1; $i <= 4; $i++) {
            \App\Specialization::create([
                'specialization' => $faker->colorName,
                'clinic_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
