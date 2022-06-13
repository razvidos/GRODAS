<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'products_id' => Products::all()->random()->id,
            'orders_id' => Orders::all()->random()->id,
        ];
    }
}
