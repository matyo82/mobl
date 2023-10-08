<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\ProductCategory;

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
		view()->composer('front.layouts.header',function($view){
			$view->with('categories',ProductCategory::all());
		});

        Paginator::useBootstrapFive();
        Paginator::defaultView('vendor.pagination.bootstrap-5');
		

    }
}
