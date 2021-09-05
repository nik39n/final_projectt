<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function countB(){
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if($orderId==null){
            $CountBasket = 0;
        }
        else{
            $CountBasket = $order->products->count();
        }
        return  $CountBasket;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count=$this->countB();
        return view('home', compact('count'));
    }
}
