<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement($array = ['male', 'female']);
        return [
            'name' => fake()->name($gender),
            'is_publish' => fake()->boolean(),
            'description' => fake()->paragraph(5),
            'gender' => $gender,
            'created_at' =>  now(),
        ];
    }
}
