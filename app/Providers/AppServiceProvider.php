<?php

namespace App\Providers;

use App\Models\admin\Products;
use Illuminate\Support\Facades\View;
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
        $menuProducts = Products::orderBy('id', 'desc')->get();
        View::share('menuProducts', $menuProducts);
    }
}
