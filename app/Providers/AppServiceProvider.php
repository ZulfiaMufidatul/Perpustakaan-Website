<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

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


        Gate::define('admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('user', function ($user) {
            return $user->role == 'user';
        });    

        Validator::extend('min_size', function($attribute, $value, $parameters, $validator) {
            // Convert KB to Bytes
            $minSize = $parameters[0] * 1024;
            return $value->getSize() >= $minSize;
        });
    
        Validator::replacer('min_size', function($message, $attribute, $rule, $parameters) {
            return str_replace(':min', $parameters[0], $message);
        });

    
    }
}
