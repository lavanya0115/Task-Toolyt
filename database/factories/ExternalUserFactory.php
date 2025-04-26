<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExternalUser>
 */
class ExternalUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->name(),
            'phone_2' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'dob'     => $this->faker->date(),
        ];
    }
}
