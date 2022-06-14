@extends('layers.html')


@section('title', 'Home')

@section('main-content')
    <div class="row">
        {{--Categories--}}
        <div class="col-auto">
            <div class="container"></div>
            <h3>Categories:</h3>
            <ul class="list-group">
                @foreach($content['categories'] as $category)
                    <li class="list-group-item"><a
                            href="{{route('categories.show',[$category->id])}}">{{$category->title}}</a></li>
                @endforeach
            </ul>
            <br>
        </div>
        {{--End Categories--}}

        {{--Products--}}
        <div class="col">
            <div class="container">
                <h3>Newest Products:</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">
                            Title
                        </th>
                        <th scope="col">
                            Description
                        </th>
                        <th scope="col">
                            Price
                        </th>
                        <th scope="col"><span class="text-nowrap">
                        Category
                    </span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content['products'] as $product)
                        <tr>
                            <td class="text-nowrap"><a
                                    href="{{route('products.show',[$product->id])}}">{{$product->title}}</a></td>
                            <td>{{$product->description}}</td>
                            <td class="text-nowrap">{{$product->price}} USD</td>
                            <td class="text-nowrap">{{$product->category_title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--End Products--}}

    </div>

@endsection
