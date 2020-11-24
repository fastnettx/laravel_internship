@extends('layouts.app')

@section('content')
    <div class="flex-center  full-height">
        <div class="container">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Корзина</h3>
                        <div class="">
                            <a href="{{ route('basket.empty') }}">Очистить корзину</a>
                        </div>


                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('basket.send') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <div class="form-group">
                                    Ваш товар:
                                </div>
                                @foreach ($baskets as $basket)
                                    <div class="form-group">
                                        Имя - {{$basket->product->name}}, количество - {{$basket->quantity}}
                                        , цена за единицу товара - {{$basket->product->price}}
                                    </div>
                                @endforeach
                                <div class="form-group ">
                                    <p class="font-weight-bold"> Всего к оплате - {{$baskets->sum('price')}} </p>
                                </div>
                                <div class="form-group col-md-8">
                                    <div>Select payment type</div>
                                    <select name="payment">
                                        @foreach ($payments as $payment)
                                            <option selected value="{{$payment->id}}">{{$payment->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Adress</label>
                                    <input type="text" name="adress" class="form-control">
                                </div>

                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Подтвердить заказ
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
