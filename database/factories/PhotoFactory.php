<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $eventIds = Event::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $photographerIds = User::where('role_id', 3)->pluck('id')->toArray();
        $title = Str::ucfirst($this->faker->words(5, true));
        return [
            'title' => Str::ucfirst($this->faker->words(5, true)),
            'description' => Str::ucfirst($this->faker->words(15, true)),
            'image' => $this->faker->imageUrl(2560, 1444, Str::substr($title, 0, 12)),
            'event_id' => $eventIds[array_rand($eventIds)],
            'category_id' => $categoryIds[array_rand($categoryIds)],
            'photographer_id' => $photographerIds[array_rand($photographerIds)],
        ];
    }
}
