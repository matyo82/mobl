<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        view()->composer('front.layouts.header', function ($view) {
            $view->with('categories', ProductCategory::all());
			if(Auth::check()){
                $cartItems=CartItem::where('user_id',Auth::user()->id)->get();
                $view->with('cartItems',$cartItems);
            }

        });

        Paginator::useBootstrapFive();
        Paginator::defaultView('vendor.pagination.bootstrap-5');


    }
}
