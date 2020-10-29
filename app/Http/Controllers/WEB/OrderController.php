<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\API\Payment_methodsController;
use App\Http\Controllers\Controller;
use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Payment_methods;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $payments = Payment_methods::all();
        return view('order.create', ['product' => $product, 'user' => $user, 'payments' => $payments]);

    }

    public function buy(Request $request)
    {
//        dd($request);
        $adress = $request->input('adress');
        $payment = $request->input('payment');
        $number = $request->input('number');
        $product = Product::findOrFail($request->input('product_id'));
        $number = $request->input('number');

        $order = new Orders(array(
            'user_id' => Auth::user()->id,
            'status' => 0,
            'address' => $adress,
            'payment_method_id' => $payment,
        ));
        $order->save();

        $order_element = new Order_item(array(
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $number * $product->price,

        ));
//        dd($order_element);
        $order_element->save();

        return redirect('basket');

    }

    public function basket()
    {

        return 'basket';

    }

}
