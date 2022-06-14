<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products =
            DB::table('products')
                ->join(
                    'categories',
                    'products.categories_id',
                    '=',
                    'categories.id')
                ->latest('products.id')
                ->limit(20)
                ->get([
                    'products.*',
                    'categories.title as category_title'
                ]);

        $content = [
            'categories' => Categories::all(),
            'products' => $products,
        ];
        return view('home', compact(['content']));
    }
}
