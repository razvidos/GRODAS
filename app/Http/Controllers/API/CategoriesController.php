<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Categories::all();
        return new JsonResponse([
            'success' => true,
            'products' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoriesRequest $request
     * @return JsonResponse
     */
    public function store(StoreCategoriesRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $product = Categories::create($validated);
        return new JsonResponse([
            'success' => true,
            'category-id' => $product->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $category = Categories::find($id);
        $products = $category->products;  // defined to add response
        if ($category) {
            return new JsonResponse([
                'success' => true,
                'category' => $category,
            ]);
        }
        return new JsonResponse(['success' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoriesRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateCategoriesRequest $request, $id): JsonResponse
    {
        $validated = $request->validated();

        $category = Categories::find($id);
        $category->update($validated);
        return new JsonResponse([
            'success' => true,
            'product' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $category = Categories::find($id);
        if (!$category) {
            return new JsonResponse(['success' => false], 404);
        }
        if ($category->products->count() != 0) {
            return new JsonResponse([
                'success' => false,
                'message' => 'There are links with Product',
            ], 500);
        }

        if (Categories::destroy($id)) {
            return new JsonResponse([
                'success' => true,
                'deleted id' => $id,
            ]);
        }
        return new JsonResponse(['success' => false]);
    }
}
