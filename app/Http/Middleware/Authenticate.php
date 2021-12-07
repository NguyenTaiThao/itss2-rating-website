<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('api/*')) {
            return response()->json(['error' => 'authentication failed'], 401);
        }

        $previousURL = URL::previous();
        $route = app('router')->getRoutes($previousURL)->match(app('request')->create($previousURL))->getName();
        $firstNameSpace = explode('.', $route)[0];

        if ($firstNameSpace == 'brand') {
            return route('brand.login');
        }

        if ($firstNameSpace == 'admin') {
            return route('brand.login');
        }

        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
