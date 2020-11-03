@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="col-md-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Ваш заказ успешно сформирован под номером - {{$order->id}}</h3>

                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
