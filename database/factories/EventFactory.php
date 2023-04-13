<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $venueIds = Venue::pluck('id')->toArray();
        return [
            'name' => Str::ucfirst($this->faker->words(8, true)),
            'venue_id' => $venueIds[array_rand($venueIds)],
            'date' => $this->faker->dateTimeThisYear('+2 months')
        ];
    }
}
