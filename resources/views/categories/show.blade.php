@extends('layers.html')


@section('title', 'Category')

@section('main-content')


        <div class="row">
            {{--Title--}}
            <div class="col">
                <h2>{{$category->title}}</h2>
            </div>
            {{--Paginate Links--}}
            <div class="col-auto justify-content-end mt-2">
                {{$products_paginator->links()}}
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
                            {{--                            <button class="btn btn-primary btn-rounded">Buy Now</button>--}}
                            @if(!in_array($product->id, $order->products->pluck('id')->toArray()))
                                <button class="btn btn-dark btn-rounded mr-1 btn-add-to-cart" data-toggle="tooltip"
                                        title=""
                                        data-original-title="Add to cart" value="{{$product->id}}">
                                    {{--                                <i class="fa fa-cart-shopping"></i>--}}
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            @endif
                            {{--End Buy Buttons--}}

                        </div>
                    </div>

                </div>
            @endforeach
            {{--End Paginate items--}}
        </div>
        {{--{{$order->products->pluck('id')}}--}}
        @endsection


        @push('end_scripts')
            <script>
                $(document).ready(function () {
                    $('.btn-add-to-cart').click(function (e) {
                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });

                        // $('.alert').hide();
                        // $('.alert-error').hide();

                        const btn = $(this);

                        $.ajax({
                            method: 'POST',
                            url: "{{ url('orders') }}",
                            dataType: 'json',
                            data: {
                                // user_id: jQuery('#first_name').val(),
                                product_id: btn.val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (result) {
                                btn.hide();
                                $('#products-in-order').html(result.products_count);
                            },
                            error: function (result) {
                                // const alert_block = jQuery('.alert-error');
                                // alert_block.empty();
                                // alert_block.show();
                                // alert_block.html("<ul>");
                                // $.each(result.responseJSON.errors, function (key, value) {
                                //     alert_block.append('<li>' + value + '</li');
                                // });
                                // alert_block.append("</ul>");
                            },
                        });
                    });
                });
            </script>
        @endpush
