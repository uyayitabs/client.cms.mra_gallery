<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Str;

class PhotographerUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 7; $i++) {
            User::create([
                'name' => $faker->firstName() . " " . $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => now(),
                'phone' => '',
                'website' => '',
                'facebook' => '',
                'instagram' => '',      
                'role_id' => 3,
            ]);
        }
        
    }
}
