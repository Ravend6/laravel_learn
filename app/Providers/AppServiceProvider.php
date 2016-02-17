<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale(\App::getLocale());
        // dd($request);
        // dd(\Config::get('app.debug'));
        // dd(config('app.debug'));

        view()->composer('articles.index', function ($view) {
            $view->with('a', 'aaAaa');
            // $view->with('a', app('App\Article'));
        });
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
