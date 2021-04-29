<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            \App\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'age' => $faker->numberBetween(18,53),
                'password' => bcrypt('password'),
            ]);
        }
    }
}
