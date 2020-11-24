@extends('layouts.app')
@section('title', 'Page View')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Select a category to display the product
                    </div>
                    <form method="POST" action="{{ route('category.filter') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="tile-body">
                            @foreach ($categories as $category)
                                <div class="form-group">

                                    <a href="{{route('category.show', ['id'=>$category->parent_id])}}">{{ $category->name }} </a>
                                    <input type="checkbox" class="form" name="$category[]"
                                           value="{{$category->id}}">

                                </div>
                            @endforeach
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Поиск товаров
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-md-9">
                @if(isset($products))
                    <div class="card">
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
                    </div>
                    <div class="row layer1">
{{--                        {{$products->links() }}--}}
                    </div>

                @endif

            </div>
        </div>


@endsection



