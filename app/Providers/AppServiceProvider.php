<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function foo\func;
use App\Channel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Blade::if('env', function($nv) {

            return app()->environment($nv);

        });

        \View::share('channels', Channel::all());
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
