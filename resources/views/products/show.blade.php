@extends('layers.html')


@section('title', 'Product')

@section('main-content')
    {{!$product->isInOrder()}}
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
                    @if(!$product->isInOrder())
                        <button class="btn btn-dark btn-rounded btn-add-to-cart mr-1" data-toggle="tooltip" title=""
                                data-original-title="Add to cart" value="{{$product->id}}">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                    @endif
                    {{--End Buy Buttons--}}
                </div>
            </div>
        </div>
    </div>
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
