<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'price' => round($this->faker->randomFloat(2, 0, 100), 2),
            'description' => $this->faker->text(),
            'categories_id' => Categories::all()->random()->id
        ];
    }
}
