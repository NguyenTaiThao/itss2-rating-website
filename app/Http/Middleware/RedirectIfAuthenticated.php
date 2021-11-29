<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private $GUARD_USER = 'user';
    private $GUARD_BRAND = 'brand';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard($this->GUARD_BRAND)->check()) {
            return redirect(RouteServiceProvider::BRAND_HOME);
        }
        else if (Auth::guard($this->GUARD_USER)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
