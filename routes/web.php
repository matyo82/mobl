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
    return view('front.index');
});

Route::get('a' , function(){
    return auth()->loginUsingId(1); // quick login for test
});
Route::get('b' , function(){
    return auth()->logout(); // quick logout for test
});



//profile
Route::controller(ProfileController::class)->prefix('profile')->name('front.')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('profile');
    Route::put('/update', 'update')->name('profile.update');
	//address
        Route::post('/add-address', [AddressController::class, 'addAddress'])->name('profile.add-address');
        Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('profile.edit-address');
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
