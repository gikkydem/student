<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i < 10; $i++) {
            DB::table('students')->insert([

                'name' => $faker->userName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber, 
                'dob' => $faker->date('Y_m_d'),
                'gender' => $faker->phoneNumber,
                'image' => $faker->imageUrl,

            ]);
        }
    }
}
