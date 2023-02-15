<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services;
use App\Repositories;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        'PageService' => Services\PageService::class,
        'SiteService' => Services\SiteService::class,
        'SiteRepository' => Repositories\SiteRepository::class,
        'PageRepository' => Repositories\PageRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
