<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\Orders;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class OrdersController extends Controller
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
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response('Unauthorized', 403);
        }
        $product_id = $request->get('product_id');

        $parameters = [
            'user_id' => $user->id,
            '_token' => $request->get('_token')
        ];

        $order = Orders::where('user_id', $user->id)->orderByDesc('id')->first();
        if (!$order) {
            $parameters['product_ids'] = [$product_id];
            $storeOrderRequest = StoreOrdersRequest::create('orders', 'POST', $parameters);
            $storeOrderRequest->setValidator(Validator::make($parameters, $storeOrderRequest->rules()));
            return (new API\OrdersController)->store($storeOrderRequest);
        }

        $parameters['product_id'] = $product_id;

        $updateOrderRequest = UpdateOrdersRequest::create('orders', 'PUT', $parameters);
        $updateOrderRequest->setValidator(Validator::make($parameters, $updateOrderRequest->rules()));
        return (new API\OrdersController)->update($updateOrderRequest, $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @return Response|View
     */
    public function show()
    {
        $order = Auth::user()->order;
        if (!$order) {
            return response('Not Found', 404);
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Orders $orders
     * @return Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrdersRequest $request
     * @param Orders $orders
     * @return Response
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Orders $orders
     * @return Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
