@extends('layers.html')


@section('title', 'Product')

@section('main-content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="{{url()->previous()}}" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="row">
                                            <span class="col-auto mb-1">Shopping cart</span>
                                            <span class="col-auto mb-0 ml-auto">
                                                You have {{$order->products->count()}} items in your cart
                                            </span>
                                        </div>
                                    </div>

                                    @foreach($order->products as $product)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img
                                                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                width="65px">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5>{{$product->title}}</h5>
                                                            <p class="small mb-0">{{$product->description}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 80px;">
                                                            <h5 class="mb-0">${{$product->price}}</h5>
                                                        </div>
                                                        {{--                                                    <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Card details</h5>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                     class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                            </div>

                                            <p class="small mb-2">Card type</p>
                                            <i class="fab fa-cc-mastercard fa-2x me-2"></i>

@endsection
