<?php

namespace App\Http\Controllers\Person;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->where('status',1)->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        if(!Auth::user()->orders->contains($order)){
            return back();
        };
        $products = $order->products()->withTrashed()->get();
        return view('auth.orders.show', compact('order','products'));
    }
}