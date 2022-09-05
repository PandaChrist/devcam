<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre'=> $this->faker->sentence(4),
            'start_at'=> $this->faker->dateTimeInInterval("+1 months", "+20 days"),
            'end_at'=> $this->faker->dateTimeInInterval("+2 months", "+20 days"),
            'important'=>rand(0, 1)
        ];
    }
}
