@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container pt-5">
        <div class="row ">

            <form method="GET" class="container" action="{{ route('product.index') }}">
                <div class="row">
                    <div class="col-md-2  col-xs-12">
                        Filter products by price
                    </div>
                    <div class="col-md-4  col-xs-12">

                        <label for="price_from"> from
                            <input type="text" name="price_from">
                        </label>
                    </div>
                    <div class="col-md-3  col-xs-12">
                        <label for="price_to"> up
                            <input type="text" name="price_to">
                        </label>
                    </div>
                </div>
                <div class=class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <button type="submit" class="btn btn-primary">Фильтр</button>

                        <a href="{{route('product.index')}}" class="btn btn-success">Очистить</a>
                    </div>
                </div>

            </form>

            @foreach ($products as $product)
                <div class="card mt-5">
                    <div class="col-md-auto">
                        <h4>
                            <a href="{{route('product.show', ['id'=>$product->id])}}">{{ $product->name }} </a>
                        </h4>
                        <div class="card-body">
                            Price - {{number_format($product->price,2)}}
                        </div>
                        <div class="card-body">
                            Description - {{$product->description}}
                        </div>
                        <div class="card-body">
                            Quantity in stock - {{$product->in_stock}}
                        </div>
                        <div class="card-body">
                            Brand - <a
                                href="{{route('brand.show', ['id'=>$product->brand->id])}}"> {{$product->brand->name}} </a>
                        </div>
                        {{--                            <div class="card-body">--}}
                        {{--                                Category - {{$product->categories()->pluck('name')->implode('; ')}}--}}
                        {{--                            </div>--}}

                    </div>
                </div>
            @endforeach

        </div>

        <div class="row">
            {{ $products->withQueryString()->links() }}
        </div>

@endsection



