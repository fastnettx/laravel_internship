@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="{{ route('product.index') }}">
                    <div>Цена</div>
                    <div class="col-sm-10 col-md-10">
                        <label for="price_from">от
                            <input type="text" name="price_from">
                        </label>
                    </div>
                    <div class="col-sm-10 col-md-10">
                        <label for="price_to">до
                            <input type="text" name="price_to">
                        </label>
                    </div>
                    <div class="col-sm-10 col-md-10">
                        <button type="submit" class="btn btn-primary">Фильтр</button>

                    </div>
                    <div class="col-sm-1 col-md-1">
                        <a href="{{route('product.index')}}" class="btn btn-success">Очистить</a>
                    </div>
                </form>

                <div class="card">

                    @foreach ($products as $product)
                        <div class="card-header">
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
                    @endforeach

                </div>

            </div>
        </div>
    </div>
    <div class="footer">
        {{ $products->onEachSide(3)->links() }}
    </div>

@endsection



