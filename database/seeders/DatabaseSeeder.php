<?php

namespace Database\Seeders;

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
        (new UserSeeder)->run();
        (new CategoriesSeeder)->run();
        (new ProductsSeeder())->run();
        (new OrdersSeeder())->run();
    }
}
