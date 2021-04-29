<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
            \App\Admin::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
