<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        // Event::factory()
        //     ->count(300)
        //     ->create();
        $venueIds = Venue::pluck('id')->toArray();
        Event::insert([
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 1', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 2', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 3', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 4', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 5', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 6', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 7', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => '2022 MRA STATE CHAMPIONSHIP - ROUND 8', 'venue_id' => $venueIds[array_rand($venueIds)]],
            ['name' => 'APRA BATHURST CHALLENGE', 'venue_id' => $venueIds[array_rand($venueIds)]],
        ]);
    }
}
