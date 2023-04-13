<?php

namespace App\Providers;

use Illuminate\Filesystem\AwsS3V3Adapter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        Paginator::useBootstrap();
        AwsS3V3Adapter::macro('getClient', fn() => $this->client);
        Str::macro('pascalCase', function($value) {
            return preg_replace('/\s+/', '', Str::title($value));
        });
    }
}
