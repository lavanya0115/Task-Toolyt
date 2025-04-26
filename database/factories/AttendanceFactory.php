<?php

namespace Database\Factories;

use App\Models\ExternalUser;
use App\Models\InternalUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isInternal = $this->faker->boolean(50);

        return [
            'internal_user_id' => $isInternal ? InternalUser::inRandomOrder()->first()?->id : null,
            'external_user_id' => !$isInternal ? ExternalUser::inRandomOrder()->first()?->id : null,
            'login_time' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'logout_time' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
