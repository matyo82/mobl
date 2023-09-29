<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
          Route::get('/', [HomeController::class, 'index'])->name('home');
          Route::resource('/product', ProductController::class);
          Route::resource('/user', UserController::class)->except('show');
});
