@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($products as $product)
                        <div class="card-header">
                            <h4>
                                <a href="{{route('product.show', ['id'=>$product->id])}}">{{ $product->name }} </a>
                            </h4>
                            <div class="card-body">
                                Price - {{$product->price}}
                            </div>
                            <div class="card-body">
                                Description - {{$product->description}}
                            </div>
                            <div class="card-body">
                                Category - {{$product->categories()->pluck('name')->implode('; ')}}
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection



