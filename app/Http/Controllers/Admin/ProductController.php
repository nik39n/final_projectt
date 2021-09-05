<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate(10);
        return view('auth.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        $brands = Brand::get();
        $categories = Category::get();
        return view('auth.products.form', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        

        // $params = $request->all();
        // unset($params['image']);
        // if ($request->has('image')) {
        //     $params['image'] = $request->file('image')->store('products');
        // }
        
        $request->validate([]);
        $path = $request->file('image')->store('products');
        $params = $request->all();
        $params['image'] = $path;
        Product::create($params);
        return redirect()->route('products.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $brands = Brand::get();
        return view('auth.products.show', compact('product', 'brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::get();
        $categories = Category::get();
        return view('auth.products.form', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // $params = $request->all();
        // unset($params['image']);
        // if ($request->has('image')) {
        //     Storage::delete($product->image);
        //     $params['image'] = $request->file('image')->store('products');
        // }
        Storage::delete($product->image);
        if ($request->file('image') == null) {
            $path = "";
        }else{
           $path = $request->file('image')->store('products');  
        }
        $params = $request->all();
        $params['image'] = $path;
        foreach (['new','hit', 'recommend'] as $fieldName){
            if(!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }
        $product->update($params);
        return redirect()->route('products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
