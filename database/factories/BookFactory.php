<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->sentence(2),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(4),
            'publication_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'isbn' => $this->faker->unique()->isbn13(),
            'genre' => $this->faker->word(),
        ];
    }
}