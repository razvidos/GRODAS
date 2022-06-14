@extends('layers.html')


@section('title', 'Product')

@section('main-content')
    <div class="card">
        <div class="card-body">
            {{--Title--}}
            <h3 class="card-title">{{$product->title}}</h3>
            <h6 class="card-subtitle">
                <a href="{{route('categories.show',[$product->category->id])}}">
                    {{$product->category->title}}
                </a>
            </h6>
            <div class="row">
                <div class="col-auto">
                    <div class="white-box text-center">
                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png"
                             class="img-responsive" alt="Product">
                    </div>
                </div>
                <div class="col">
                    <h4 class="box-title mt-5">Product description</h4>
                    {{--Description--}}
                    <p>{{$product->description}}</p>
                    {{--Price--}}
                    <h2 class="mt-5">${{$product->price}}</h2>
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
    </div>
@endsection

@push('links')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush
