<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasketRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethods;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    protected $NOTDONE = 0;
    protected $DONE = 1;

    public function create()
    {
        $baskets = Auth::user()->basket()->whereStatus($this->NOTDONE)->get();
        $payments = PaymentMethods::all();
        return view('basket.create', ['baskets' => $baskets, 'payments' => $payments]);
    }

    public function send(BasketRequest $request)
    {
        $user = Auth::user();
        $adress = $request->input('adress');
        $payment = $request->input('payment');
        $orders_element = $user->basket()->whereStatus($this->NOTDONE)->get();

        $order = Order::create([
            'user_id' => $user->id,
            'status' => $this->NOTDONE,
            'address' => $adress,
            'payment_method_id' => $payment,
            'sum' => $orders_element->sum('price'),
        ]);

        foreach ($orders_element as $element) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $element->product_id,
                'quantity' => $element->quantity,
                'price' => $element->price
            ]);
        }
        $user->basket()->whereStatus($this->NOTDONE)->update(['status' => $this->DONE]);
        $user->basket()->whereStatus($this->DONE)->delete();
        return view('basket.viewing', ['order' => $order]);
    }
}
