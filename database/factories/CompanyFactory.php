<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'headquarters_location' => fake()->address(),
            'company_image' => fake()->imageUrl(360, 360, 'animals', true, 'cats'),
            'employees' => 50,
            'user_id' => 1,
        ];
    }
}
