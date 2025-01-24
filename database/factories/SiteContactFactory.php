<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContact>
 */
class SiteContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'reason' => $this->faker->numberBetween(1, 3),
            'message' => $this->faker->text(200),
        ];
    }
}
