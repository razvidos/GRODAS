<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\OrdersProducts;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders::factory(5)->create();
        OrdersProducts::factory(15)->create();
    }
}
