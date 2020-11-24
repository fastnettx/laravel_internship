@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Product name - {{  $product->name }}</h3>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order.add') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <h3>Price - {{   number_format($product->price, 2) }}</h3>
                            </div>
                            <input type="hidden" name="product_id" value="{{  $product->id }}" class="form-control">
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label"> Indicate Quantity</label>
                                    <div class="col-md-4">
                                        <input type="number" name="quantity" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-danger">
                                {{Session::get('quantity')}}
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Добавить в корзину
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
