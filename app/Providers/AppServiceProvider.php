<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //LOOK: http://stackoverflow.com/questions/23786359/laravel-migration-unique-key-is-too-long-even-if-specified
        Schema::defaultStringLength(191);

        /**
         * 增加时间格式校验规则
         */
        Validator::extend('time', function($attribute, $value, $parameters, $validator) {
            $cols = explode(':', $value);
            if (count($cols) != 3) {
                return false;
            }
            return $cols[1] < 60 && $cols[2] < 60;
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
