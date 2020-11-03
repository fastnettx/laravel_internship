@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3>
                           Brand - {{  $brand->name  }}
                        </h3>
                    </div>
                    <div class="card-body">
                        Выберите продукт:
                        @foreach ($brand->product as $product)
                            <div>
                                Product: <a href="{{route('product.show', ['id'=>$product->id])}}">{{$product->name}} </a>
                                - {{ $product->description }}
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
