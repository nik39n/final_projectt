<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BasketvController extends Controller
{
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
    

    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        } else {
            $order = Order::create();
        }
        $count=$this->countB();
        return view('basket.index', compact('order','count'));
    }
    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку');
        } else {
            session()->flash('warning', 'Произошла ошибка');
        }

        return redirect()->route('index');
    }
    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $count=$this->countB();
        return view('basket.checkout', compact('order','count'));
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }




        $product = Product::find($productId);
        session()->flash('success', 'Добавлен товар ' . $product->name);

        return redirect()->route('basket');
    }
    public function basketRemove(Request $request,$productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);
        $request->session()->flash('warning', 'Удален товар ' . $product->name);

        return redirect()->route('basket');
    }

    public function basketClear($productId){
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        
        
        if ($order->products->contains($productId)) {
           $order->products()->where('product_id', $productId)->first()->pivot;
            $order->products()->detach($productId);
        }

        session()->flash('warning', 'Удален товар ');

        return redirect()->route('basket');
    }

    
}
        