<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandAuth
{

    const GUARD_BRAND = 'brand';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard(self::GUARD_BRAND)->check()) {
            return $next($request);
        }
        return abort(401);
    }
}
