<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class SearchController extends Controller
{
    public function __invoke(Request $request){
        $orderId = session('orderId');
        $order = Order::find($orderId);
        if($orderId==null){
            $count = 0;
        }
        else{
            $count = $order->products->count();
        }

        $value=$request->input('search');
        $menings=Product::where('name','like',$value.'%')->paginate(9);
        return view('search.index', compact('menings','count'));
    }
}
