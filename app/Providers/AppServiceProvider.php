<?php

namespace App\Providers;

use App\FrontUser;
use App\Http\Middleware\FrontAuthenticate;
use App\Http\Middleware\InitFrontend;
use Carbon\Carbon;
use Config;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
        DB::statement('call check_rented(?)', [Carbon::now()->format('Y-m-d H:i:s')]);

        $router->middlewareGroup('front', $kernel->getMiddlewareGroups()['web']);

//        INIT FRONTEND
        $router->pushMiddlewareToGroup('front', InitFrontend::class);
        RedirectResponse::macro('withMessage', function ($type, $message, $status = 200, $data = false) {
            if (request()->ajax()) {
                $response_data = ['status' => $type, 'message' => $message];
                if ($data && is_array($data)) {
                    $response_data = array_merge_recursive($response_data, $data);
                }
                return response()->json($response_data, $status);
            }
            return RedirectResponse::with('flash.message', $message)->with('flash.type', $type);
        });
        Blade::directive('message', function ($message) {
            return '
            <?php
                $session = session(\'flash\');
                if($session) {
                    $type = $session[\'type\']??\'info\';
                    $message = $session[\'message\']??\'Nieznany błąd, skontaktuje się z administratorem\';
                    echo \'<div id="session_message" class="session_message alert alert-\'.$type.\'">\'.$message.\'</div>\';
                }
             ?>';
        });
    }
}
