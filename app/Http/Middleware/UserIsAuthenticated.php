<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserIsAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user())
            return $next($request);

        return redirect('/');
    }
}
