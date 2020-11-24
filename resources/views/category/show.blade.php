@extends('layouts.app')
@section('title', 'detail')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-info"><h2> {{$category->name}} </h2>
                    </div>
                    <div class="card-body">
                        Product list :
                    </div>
                    <div class="card-body">
                        @foreach ($products as $product)
                            <div class="card-body">
                                <h4>
                                    <a href="{{route('product.show', ['id'=>$product->id])}}">{{ $product->name }} </a>

                                </h4>
                                <div>
                                    {{ $product->description }}
                                </div>

                            </div>
                        @endforeach
                        {{--                        {{ $category->products }}</br>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row layer1">
        {{$products->links() }}
    </div>


@endsection

