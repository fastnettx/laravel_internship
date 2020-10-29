@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3>
                            {{  $brand->name  }}
                        </h3>
                    </div>
                    <div class="card-body">
                        @foreach ($brand->product as $product)
                            <div>
                                <a href="{{route('product.show', ['id'=>$product->id])}}">{{$product->name}} </a>
                                - {{ $product->sku }}
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
