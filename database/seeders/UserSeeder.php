<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i = 1; $i < 20; $i++) {
            DB::table('users')->insert([

                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => $faker->password, 
            ]);
        }
    }
}
