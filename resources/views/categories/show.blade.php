@extends('layers.html')


@section('title', 'Category')

@section('main-content')


    <div class="container">
        <div class="row">
            {{--Title--}}
            <div class="col">
                <h2>{{$category->title}}</h2>
            </div>
            {{--Paginate Links--}}
            <div class="col-auto justify-content-end">
                {{$products_paginator->links()}}
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            {{--Paginate items--}}
            @foreach($products_paginator->items() as $product)
                <div class="col-md-4 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-actions">
                                <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"
                                     class="card-img img-fluid" width="96" height="350" alt="">
                            </div>
                        </div>

                        <div class="card-body bg-light text-center">
                            <div class="mb-2">

                                {{--Title--}}
                                <h6 class="font-weight-semibold mb-2">
                                    <a href="{{route('products.show',[$product->id])}}" class="text-default mb-2"
                                       data-abc="true">
                                        {{$product->title}}
                                    </a>
                                </h6>

                                {{--Description--}}
                            </div>

                            {{--Description--}}
                            <h3 class="mb-0 font-weight-semibold">${{$product->price}}</h3>

                            {{--Buy Buttons--}}
                            <button class="btn btn-primary btn-rounded">Buy Now</button>
                            <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title=""
                                    data-original-title="Add to cart">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                            {{--End Buy Buttons--}}

                        </div>
                    </div>

                </div>
            @endforeach
            {{--End Paginate items--}}
        </div>
    </div>

@endsection

@push('links')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush
