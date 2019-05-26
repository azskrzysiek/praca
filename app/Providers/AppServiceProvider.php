<?php

namespace App\Providers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        view()->composer('layouts.nav', function($view) {
            $view->with('user', User::thisUser());
        });

        Carbon::setLocale('pl');

        Validator::extend('domain', function($attribute, $value, $parameters)
        {
            if(empty($value))
            {
                return true;

            } else {
                $domain = $parameters[0];
                $pattern = "#^https?://([a-z0-9-]+\.)*".preg_quote($domain)."(/.*)?$#";
                return !! preg_match($pattern, $value);
            }
        });
    }
}
