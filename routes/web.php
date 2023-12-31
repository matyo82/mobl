<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\AddressController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FavoriteController;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('test' , function(){
    return auth()->loginUsingId(1); // quick login for test
});


//index
Route::get('/',[HomeController::class,'home'])->name('index');


//about
Route::get('/about' ,  function(){
    return view('front.about');
})->name('about');


//product
Route::controller(ProductController::class)->name('front.')->group(function(){
    Route::get('product-list/{category?}' , 'list')->name('product-list');
    Route::get('product/{product}' , 'single')->name('product');
    Route::get('/add-to-favorite/{product}' , 'addToFavorite')->name('product.addToFavorite');
});


//profile
Route::controller(ProfileController::class)->prefix('profile')->name('front.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('profile');
    Route::put('/update', 'update')->name('profile.update');
	//address
    Route::post('/add-address', [AddressController::class, 'store'])->name('profile.add-address');
    Route::post('/update-address/{address}', [AddressController::class, 'update'])->name('profile.edit-address');
    Route::delete('/profile/delete-address/{address}' , [AddressController::class , 'deleteAddress'])->name('profile.delete-address');
});

//favorites
Route::controller(FavoriteController::class)->prefix('favorite')->name('front.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('favorite');
	Route::get('/remove-from-favorite/{product}', 'removeFromCart')->name('favorite.remove-from-favorite');
});

//cart
Route::controller(CartController::class)->prefix('cart')->name('front.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('cart');
    Route::post('/add-to-cart/{product}','addToCart')->name('product.add-to-cart');
	Route::get('/remove-from-cart/{cartItem}', 'removeFromCart')->name('product.remove-from-cart');
	Route::post('/payement','payment')->name('cart.payment');
	Route::get('/verify-payment', 'verifyPayment')->name('cart.verifyPayment');
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
