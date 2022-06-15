<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Categories;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoriesController extends Controller
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
     * @param StoreCategoriesRequest $request
     * @return Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Categories $categories
     * @return View
     */
    public function show(Categories $category): View
    {
        $order = null;
        $products_paginator =
            DB::table('products')
                ->where('categories_id', $category->id)
                ->simplePaginate(15);

        if($user = Auth::user()) {
            $order = $user->order;
        }
        return view('categories.show', compact(
            'category',
            'products_paginator',
            'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Categories $categories
     * @return Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoriesRequest $request
     * @param Categories $categories
     * @return Response
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Categories $categories
     * @return Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
