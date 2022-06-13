<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductsOrder;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Categories::factory(10)->create();
        Products::factory(50)->create();
        Orders::factory(5)->create();
        ProductsOrder::factory(15)->create();
    }
}
