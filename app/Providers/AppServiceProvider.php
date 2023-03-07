<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services;
use App\Repositories;
use App\Entities;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        'PageService' => Services\PageService::class,
        'SiteService' => Services\SiteService::class,
        'SiteRepository' => Repositories\SiteRepository::class,
        'PageRepository' => Repositories\PageRepository::class,
        'Site' => Entities\Site::class,
        'Page' => Entities\Page::class,
        'Content' => Entities\Content::class,
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
