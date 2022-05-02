<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quantity = 10;
        $images = [];

        for ($i = 0; $i < $quantity; $i++) {
            $images[] = $this->faker->imageUrl();
        }

        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->paragraph(3),
            'images' => $images
        ];
    }
}
