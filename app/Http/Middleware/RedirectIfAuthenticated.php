<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
            elseif ($guard == "cliente" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::DASHBOARD);
            }
            elseif ($guard == "empresa" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::DASHBOARD_EMPRESAS);
            }
        }

        return $next($request);
    }
}
