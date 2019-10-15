<?php

namespace App\Providers;

use App\Http\Middleware\InitFrontend;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Router $router, Kernel $kernel)
    {
        $router->middlewareGroup('front', $kernel->getMiddlewareGroups()['web']);
        $router->pushMiddlewareToGroup('front', InitFrontend::class);
    }
}
