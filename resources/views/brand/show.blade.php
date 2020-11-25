@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div class="col-md-4">
                            <h3>
                                Brand
                            </h3>
                        </div>
                        <div class="col-md-4">{{  $brand->name  }}
                            <img src="{{$brand->getFirstMediaUrl('images_brand', 'thumb')}}"/>
                        </div>

                    </div>
                    <div class="card-body">
                        Выберите продукт:
                        @foreach ($products as $product)
                            <div class="row justify-content-center">
                                <a href="{{route('product.show', ['id'=>$product->id])}}">{{$product->name}} </a>
                            </div>
                            <div>
                                {{ $product->description }}
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <div>
            {{$products->withQueryString()->links()}}
        </div>
    </div>

@endsection
