<?php

namespace App\Providers;

use App\Models\Addcart;
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

        View::composer('*', function ($view) {
            $cartItems = Addcart::all();
            $count = 0;

            foreach ($cartItems as $item) {
                $count += $item->quantity;
            }

            $view->with('count', $count);
        });
    }
}
