<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
        if ($request->user('brand')->is_active) {
            return $next($request);
        }
        Auth::logout();
        return View('upgrade.index');
    }
}
