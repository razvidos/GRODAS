<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\OrdersProducts;
use App\Models\Products;
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
        OrdersProducts::factory(15)->create();
    }
}
