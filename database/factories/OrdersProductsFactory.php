<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Products::all()->random()->id,
            'order_id' => Orders::all()->random()->id,
        ];
    }
}
