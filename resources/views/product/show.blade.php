@extends('layouts.app')
@section('title', 'detail')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">

                <h4>
                    Product name - {{ $product->name }}
                </h4>
                <div class="card-body">
                    Sku - {{$product->sku}}
                </div>
                <div class="card-body">
                    Description - {{$product->description}}
                </div>
                <div class="card-body">
                    Price - {{number_format($product->price,2)}}
                </div>
                <div class="card-body">
                    Quantity in stock - {{$product->in_stock}}
                </div>
                <div class="card-body">
                    Brand - <a
                        href="{{route('brand.show', ['id'=>$product->brand->id])}}">{{$product->brand->name}} </a>

                </div>
                <div class="card-body">
                    Category -
                    @foreach ($product->categories as $category)
                        <a href="{{route('category.show', ['id'=>$category->id])}}">{{$category->name}}, </a>
                    @endforeach
                </div>
                @auth
                    <div class="col-md-4">
                        <a href="{{ route('order.create', ['id'=>$product->id]) }}" class="btn btn-success">Купить</a>
                    </div>
                @endauth

            </div>
        </div>
    </div>



@endsection
@section('bottom')
    <h3><a href="/home/view"> To view </a></h3>
@endsection
