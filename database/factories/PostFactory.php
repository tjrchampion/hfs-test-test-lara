<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(5, true);

        return [
            'user_id' => User::all()->random()->id,
            'title' => $title,
            'body' => $this->faker->text,
            'slug' => Str::slug($title),
            'email_sent' => $this->faker->boolean
        ];
    }
}
