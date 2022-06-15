<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\Orders;
use App\Models\OrdersProducts;
use Illuminate\Http\JsonResponse;

class OrdersController extends Controller
{
    /**
     * @param $order_id
     * @param $product_ids
     */
    protected static function createLinkWitProducts($order_id, $product_ids)
    {
        foreach ($product_ids as $product_id) {
            OrdersProducts::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = Orders::all();
        foreach ($orders as $product) {
            $user = $product->user;
        }

        return new JsonResponse([
            'success' => true,
            'orders' => $orders,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrdersRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrdersRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $product_ids = $validated['product_ids'];
        unset($validated['product_ids']);

        $order = Orders::create($validated);
        self::createLinkWitProducts($order->id, $product_ids);
        return new JsonResponse([
            'success' => true,
            'order_id' => $order->id,
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
        $order = Orders::find($id);
        if ($order) {
            $user = $order->user;  // defined to add response
            $products = $order->products;  // defined to add response
            return new JsonResponse([
                'success' => true,
                'order' => $order
            ]);
        }
        return new JsonResponse(['success' => false], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrdersRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateOrdersRequest $request, int $id): JsonResponse
    {
        $validated = $request->validated();
        if ($validated == array()) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Nothing to update',
            ], 400);
        }

        $order = Orders::find($id);
        if (isset($validated['user_id'])) {
            $order->update($validated);
        }

        if (isset($validated['product_ids'])) {
            $result = OrdersProducts::where('order_id', $id)->delete();
            self::createLinkWitProducts($id, $validated['product_ids']);
        }

        if (isset($validated['product_id'])) {
            self::createLinkWitProducts($id, [$validated['product_id']]);
        }

        $order_show = json_decode($this->show($id)->getContent());
        if (!$order_show->success) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Something went wrong',
            ], 500);
        }
        return new JsonResponse([
            'success' => true,
            'order' => $order_show->order,
            'products_count' => $order->products->count(),
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
        if (Orders::destroy($id)) {
            return new JsonResponse([
                'success' => true,
                'deleted id' => $id,
            ]);
        }
        return new JsonResponse(['success' => false],);
    }
}
