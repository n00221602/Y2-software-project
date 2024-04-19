<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_name' => fake()->word,
            'origin_country' => fake()->word,
            'ethical' => fake()->randomElement(['Yes','No']),
            'rating' => fake()->randomNumber(2),
            'brand_logo' => fake()->imageURL,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
