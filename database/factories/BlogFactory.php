<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence(2);
        $slug = Str::slug($title);

        return [
            'slug' => $slug,
            'title' => $title,
            'theme' => fake()->randomElement([
                'base',
                'light-blue',
                'light-yellow',
                'light-green',
                'light-pink',
                'light-purple',
                'light-orange',
                'light-red',
                'dark-blue',
                'dark-yellow',
                'dark-green',
                'dark-pink',
                'dark-purple',
                'dark-orange',
                'dark-red'
            ]),
            'description' => fake()->sentence(12),
            'image_path' => 'empty',
        ];
    }
}
