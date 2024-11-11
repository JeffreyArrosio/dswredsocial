<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->words(3, true);  // Un título de 3 palabras

        return [
            'title' => $title,
            'slug' => Str::slug($title), // Convertir el título a un slug (en minúsculas y sin espacios)
            'color' => $this->faker->hexColor(), // Generar un color hexadecimal aleatorio
        ];
    }
}
