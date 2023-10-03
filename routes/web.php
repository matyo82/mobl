<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\AddressController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::prefix('admin')->group(function () {
   Route::get('/',[\App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
   Route::resource('/product', \App\Http\Controllers\Admin\ProductController::class);
});



//profile
Route::controller(ProfileController::class)->prefix('profile')->group(function () {
    Route::get('/', 'index')->name('front.profile');
    Route::put('/update', 'update')->name('front.profile.update');
	//address
        Route::post('/add-address', [AddressController::class, 'addAddress'])->name('front.profile.add-address');
        Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('front.profile.edit-address');

});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
