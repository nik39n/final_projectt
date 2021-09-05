<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withtimestamps();
    } 

    
    public function calculateFullSum()
    {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }
    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }
    public static function getFullSum()
    {
        return session('full_order_sum', 0);
    }

    public function getFullPrice(){
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();

        }
        return $sum;
    }  
    public function saveOrder($name,$phone){
        if ($this->status == 0){
            $this->name= $name;
            $this->phone=$phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
        
    }  
}
