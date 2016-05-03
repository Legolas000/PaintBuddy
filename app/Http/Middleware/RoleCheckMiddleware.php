<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (Auth::check() && Auth::user()->role!=$role)
        {
            return redirect('/')->with('msg','You are not allow to see '.$role.' page');
        }

        return $next($request);

    }
}
