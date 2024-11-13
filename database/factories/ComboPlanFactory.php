<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComboPlan>
 */
class ComboPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'plan_id' => Plan::inRandomOrder()->first()->id ?? Plan::factory()->create()->id,
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
