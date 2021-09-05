<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('admin');
    // }


    // public function __invoke(Request $request)
    // {
    //     return view('admin.index');
    // }
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
    public function index()
    {
        $count=$this->countB();
        return view('admin.index', compact('count'));
    }
}
