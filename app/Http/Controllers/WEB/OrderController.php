<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\API\Payment_methodsController;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethods;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $NOTDONE = 0;
    protected $DONE = 1;

    public function create($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        return view('order.create', ['product' => $product, 'user' => $user]);
    }



    public function add(OrderRequest $request)
    {
        $product = Product::find($request->input('product_id'));
        $quantity = $request->input('quantity');
        $user = Auth::user();
        $basket = Basket::create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price * $quantity,
                'user_id' => $user->id,
                'status' => $this->NOTDONE,
            ]

        );
        return redirect()->route('product.index');
    }

}
