<?php

namespace App\Http\Middleware;

use App\FrontUser;
use Closure;
use Config;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;

class InitFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $app = app();
        Config::set('auth.providers.front_users', ["driver" => "eloquent", "model" => FrontUser::class]);
        Config::set('auth.guards.front', ["driver" => "session", "provider" => "front_users"]);
        Config::set('auth.passwords.front_users',
            ["provider" => "front_users", "table" => "front_password_resets", "expire" => 10080]);
        Config::set('auth.defaults.passwords', 'front_users');
        auth()->setDefaultDriver('front');
        $app['router']->aliasMiddleware('auth', FrontAuthenticate::class);
        $app['router']->aliasMiddleware('verified', EnsureEmailIsVerified::class);
        return $next($request);
    }
}
