<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use Auth;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductsRequest $request
     * @return Response
     */
    public function store(StoreProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Products $products
     * @return Response|View
     */
    public function show(Products $product)
    {
        if ($user = Auth::user()) {
            if ($order = $user->order) {
                $product_in_order = $order->products->find($product->id);
                if ($product_in_order) {
                    $product->inOrder();
                }
            }
        }
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductsRequest $request
     * @param Products $products
     * @return Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Products $products
     * @return Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
