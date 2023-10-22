<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductFabricController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('index');


//product
Route::resource('/product', ProductController::class);
Route::prefix('product')->name('product-fabric.')->group(function () {
    //product-fabric
    Route::get('{product}/product-fabric', [ProductFabricController::class, 'index'])->name('index');
    Route::get('{product}/product-fabric/create', [ProductFabricController::class, 'create'])->name('create');
    Route::post('{product}/product-fabric/store', [ProductFabricController::class, 'store'])->name('store');
    Route::delete('product-fabric/destroy/{productfabric}', [ProductFabricController::class, 'destroy'])->name('destroy');
});


//orders
Route::resource('/orders', OrderController::class);
Route::prefix('order')->name('orders.')->controller(OrderController::class)->group(function(){
    Route::get('{order}/show-factor', 'showFactor')->name('show-factor');
    Route::get('{order}/show-factor/details', 'details')->name('show-factor.details');
    Route::get('{order}/change-status', 'changeOrderStatus')->name('change.status');
});


//user
Route::resource('/user', UserController::class)->except('show');

Route::controller(UserController::class)->group(function(){
    Route::get('/set-admin/{user}' , 'setAdmin')->name('set-admin');
    Route::get('/unset-admin/{user}' , 'unsetAdmin')->name('unset-admin');
});
