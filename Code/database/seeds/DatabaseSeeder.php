<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserSeeder::class,
             AdminSeeder::class,
             SettingSeeder::class,
//             ClinicSeeder::class,
//             SpecialitySeeder::class,
//             AppointmentSeeder::class,
//             ServiceSeeder::class,
//             SpecializationSeeder::class
         ]);
    }
}
