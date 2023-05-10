<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
<<<<<<< HEAD
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
=======
        // if (config('app.env') === 'production') {
        //     URL::forceScheme('https');
        // }
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        Schema::defaultStringLength(191);
    }
}
