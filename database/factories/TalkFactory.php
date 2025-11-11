<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talk>
 */
class TalkFactory extends Factory
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
            'description' => fake()->sentence(12),
            'content' => fake()->sentence(255),
            'image_path' => 'empty',
        ];
    }
}
