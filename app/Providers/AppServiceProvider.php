<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    public function boot(UrlGenerator $url)
    {
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }

        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
//    public function boot()
//    {
//        Schema::defaultStringLength(191);
//
//    }
//
//    /**
//     * Register any application services.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        //
//    }
}
