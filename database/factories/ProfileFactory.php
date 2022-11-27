<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['Male', 'Female'];
        $slug = $this->faker->name;
        return [
            'slug' => Str::of($slug)->slug('-'),
            'gender' => Arr::random($gender),
        ];
    }
}
