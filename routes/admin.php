<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductFabricController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
          Route::get('/', [HomeController::class, 'index'])->name('admin.user.index');
         
		 Route::resource('/product', ProductController::class);
		    //product-fabric
            Route::get('product/{product}/product-fabric', [ProductFabricController::class, 'index'])->name('product-fabric.index');
            Route::get('product/{product}/product-fabric/create', [ProductFabricController::class, 'create'])->name('product-fabric.create');
            Route::post('product/{product}/product-fabric/store', [ProductFabricController::class, 'store'])->name('product-fabric.store');
            Route::delete('product/product-fabric/destroy/{productfabric}', [ProductFabricController::class, 'destroy'])->name('product-fabric.destroy');
			
		    Route::resource('/orders',OrderController::class);
	        Route::get('order/{order}/show-factor',[OrderController::class,'showFactor'])->name('orders.show-factor');
	        Route::get('order/{order}/show-factor/details',[OrderController::class,'details'])->name('orders.show-factor.details');
	        Route::get('order/{order}/change-status',[OrderController::class,'changeOrderStatus'])->name('orders.change.status');
			
          Route::resource('/user', UserController::class)->except('show');
});
