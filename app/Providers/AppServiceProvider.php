<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\ServiceProvider;
use App\Category;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categoryOnSidebar', Category::all());
        View::share('newsOnPublic', Product::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
