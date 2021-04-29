<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 4; $i++) {
            \App\Services::create([
                'service' => $faker->colorName,
                'image' => 'users/images/default.png',
                'clinic_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
