@extends('layouts.app')
@section('title', 'detail')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Category : {{ $category->name}} </h2>
                    </div>
                    <div class="card-body">
                        Product list :
                    </div>
                    <div class="card-body">
                        @foreach ($category->products as $product)
                            <div class="card-body">
                                <h4>
                                    <a href="{{route('product.show', ['id'=>$product->id])}}">{{ $product->name }} </a>

                                </h4>

                            </div>
                        @endforeach
                        {{--                        {{ $category->products }}</br>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('bottom')
    <h3><a href="/home/view"> To view </a></h3>
@endsection
