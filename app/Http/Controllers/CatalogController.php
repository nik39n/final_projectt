<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Http\Request;
use App\Http\Requests\CatalogFilterRequest;

class CatalogController extends Controller {


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

    public function index() {
        $roots = Category::where('parent_id', 0)->get();
        $count=$this->countB();
        return view('catalog.allcategory', compact('roots','count'));
    }
    public function allbrand() {
        $brands = Brand::get();
        $count=$this->countB();
        return view('catalog.allbrands', compact('brands','count'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->firstOrFail();
        $count=$this->countB();
        return view('catalog.category', compact('category','count'));
    }

    public function brand($slug) {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $count=$this->countB();
        return view('catalog.brand', compact('brand','count'));
    }

    public function product($slug) {
        $product = Product::withTrashed()->where('slug', $slug)->firstOrFail();
        $brand_id = $product->brand_id;
        $brand = Brand::where('id', $brand_id)->firstOrFail();
        $count=$this->countB();
        return view('catalog.product', compact('product','brand','count'));
    }
    public function allprod(CatalogFilterRequest $request){
        $selectedhit=null;
        $selectednew=null;
        $selectedbigsmall=null;
        $selectedsmallbig=null;
        
        // dd($request->all());
        $productQuery = Product::query();
        if($request->input('select')=='hit'){
            $productQuery->where('hit',1);
            $selectedhit = 'selected';
        }
        if($request->input('select')=='new'){
            $productQuery->where('new',1);
            $selectednew = 'selected';

        }
        if($request->input('select')=='bigsmall'){
            $productQuery->orderby('price','desc');
            $selectedbigsmall = 'selected';

        }
        if($request->input('select')=='smallbig'){
            $productQuery->orderby('price','asc');
            $selectedsmallbig = 'selected';

        }
        if($request->filled('price_from')){
            $productQuery->where('price','>=',$request->price_from);
        }


        if($request->filled('price_to')){
            $productQuery->where('price','<=',$request->price_to);
        }

        
        $countProd = $productQuery->count();
        

        $allproduct = $productQuery->paginate(9)->withPath("?".$request->getQueryString());
        $count=$this->countB();

        


        return view ('catalog.index', compact('allproduct','countProd','selectedhit','selectednew','selectedbigsmall','selectedsmallbig','count'));
    }
}