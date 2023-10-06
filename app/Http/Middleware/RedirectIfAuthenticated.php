<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'admin':
                    return redirect(RouteServiceProvider::HOME);
                    break;
                case 'cliente':
                    return redirect(RouteServiceProvider::DASHBOARD);
                    break;
                case 'empresa':
                    return redirect(RouteServiceProvider::DASHBOARD_EMPRESAS);
                    break;
            }
        }

        return $next($request);
    }
}
