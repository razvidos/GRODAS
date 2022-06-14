<?php

//use App\Http\Controllers\API\CategoriesController;
//use App\Http\Controllers\API\OrdersController;
use App\Http\Controllers\API\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product123', [ProductsController::class, 'store']);

Route::apiResources([
    'products' => ProductsController::class,
//    'categories' => CategoriesController::class,
//    'orders' => OrdersController::class,
]);
