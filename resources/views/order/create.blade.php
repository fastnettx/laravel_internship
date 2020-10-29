@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="col-md-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Product name - {{  $product->name }}</h3>
                        <h3>Product price - {{   $product->price }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order.buy') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">

                                <div class="form-group">
                                    <label class="control-label"> Indicate Quantity</label>
                                    <input type="number" name="number" class="form-control">
                                </div>
                                <div class="form-group col-md-8">
                                    <div>Select payment type </div>
                                    <select name="payment"  >
                                        @foreach ($payments as $payment)
                                            <option selected value="{{$payment->id}}">{{$payment->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Adress</label>
                                    <input type="text" name="adress" class="form-control">
                                </div>
                                <input type="hidden" name="product_id" value="{{  $product->id }}"class="form-control">
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
