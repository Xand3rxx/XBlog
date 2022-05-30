<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->senetence(),
            'body'  => $this->faker->unique()->paragraph(),
            'extra' => json_encode([
                'author' => $this->faker->name(),
                'avatar' => $this->faker->imageUrl(640, 480)
            ]),
        ];
    }
}
