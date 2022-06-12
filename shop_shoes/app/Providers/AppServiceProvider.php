<?php

namespace App\Providers;

use App\Composer\ProductsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['users.pages.products.adidas',
            'users.pages.products.nike',
            'users.pages.products.vans'], ProductsComposer::class
        );
    }
}
