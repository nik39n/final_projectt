<?php 
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class RedirectIfAuthenticated {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        // $orderId = session('orderId');
        // $order = Order::findOrFail($orderId);
        // $countBasket = $order->products->count();
        if (Auth::guard($guard)->check()) {
            return redirect()->route('home');
            // return redirect()->route('user.index');
        }

        return $next($request);
    }
}