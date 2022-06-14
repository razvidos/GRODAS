<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Products::all();
        return new JsonResponse([
            'success' => true,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductsRequest $request
     * @return JsonResponse
     */
    public function store(StoreProductsRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $product = Products::create($validated);
        return new JsonResponse([
            'success' => true,
            'product-id' => $product->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $product = Products::find($id);
        if ($product) {
            return new JsonResponse([
                'success' => true,
                'product' => $product
            ]);
        }
        return new JsonResponse(['success' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductsRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateProductsRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        if ($validated == array()) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Nothing to update',
            ], 400);
        }
        $product = Products::find($id);
        $product->update($validated);
        return new JsonResponse([
            'success' => true,
            'product' => $product,
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
        if (Products::destroy($id)) {
            return new JsonResponse([
                'success' => true,
                'deleted id' => $id,
            ]);
        }
        return new JsonResponse(['success' => false],);
    }
}
