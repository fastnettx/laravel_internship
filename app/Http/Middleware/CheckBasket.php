<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckBasket
{
    protected $NOTDONE = 0;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->basket()->whereStatus($this->NOTDONE)->count() == 0) {
            Session::flash('status_empty', 'Your cart is empty, add a load');
            return redirect()->route('product.index');
        }

        return $next($request);
    }
}
