<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\BasketvController;


Route::get('/', 'App\Http\Controllers\IndexController')->name('index');


Route::get('search','App\Http\Controllers\SearchController')->name('search.index');

Route::group(['prefix' => 'basket'], function () {
    Route::post('add/{id}', 'App\Http\Controllers\BasketvController@basketAdd')->name('basket-add');

    Route::group(['middleware' => 'basket_not_empty'], function () {
        Route::get('/', 'App\Http\Controllers\BasketvController@basket')->name('basket');
        Route::get('place', 'App\Http\Controllers\BasketvController@basketPlace')->name('basket-place');
        Route::post('remove/{id}', 'App\Http\Controllers\BasketvController@basketRemove')->name('basket-remove');
        Route::post('clear/{id}', 'App\Http\Controllers\BasketvController@basketClear')->name('basket-clear');
        Route::post('place', 'App\Http\Controllers\BasketvController@basketConfirm')->name('basket-confirm');
    });
});





Route::get('/catalog/index', 'App\Http\Controllers\CatalogController@index')->name('catalog.index');
Route::get('/catalog/category/{slug}', 'App\Http\Controllers\CatalogController@category')->name('catalog.category');
Route::get('/catalog/brand/{slug}', 'App\Http\Controllers\CatalogController@brand')->name('catalog.brand');
Route::get('/catalog/product/{slug}', 'App\Http\Controllers\CatalogController@product')->name('catalog.product');
Route::get('/catalog/product', 'App\Http\Controllers\CatalogController@allprod')->name('catalog.allprod');
Route::get('/catalog/brand', 'App\Http\Controllers\CatalogController@allbrand')->name('catalog.allbrand');








Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', [App\Http\Controllers\Person\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders{order}', [App\Http\Controllers\Person\OrderController::class, 'show'])->name('orders.show');
    });



    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('home');
            Route::get('/orders{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
        });

        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
        Route::resource('brands', 'App\Http\Controllers\Admin\BrandController');
        
    });
});





Route::get("/logout", 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');


