<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if (app()->environment(['production'])) {
            $this->app['request']->server->set('HTTPS','on');
            URL::forceScheme('https');
        }

        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
