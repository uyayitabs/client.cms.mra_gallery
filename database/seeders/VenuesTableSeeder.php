<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venue::truncate();
        // Venue::factory()
        //     ->count(200)
        //     ->create();
        Venue::insert([
            ['name' => 'Wakefield Park Raceway'],
            ['name' => 'Mount Panorama'],
            ['name' => 'Sydney Motorsport Park'],
        ]);
    }
}
