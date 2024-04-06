<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Level;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        // if (Auth::check() && Auth::user()->level == 'admin') {
        //     return $next($request);
        // }

        // return redirect('/login'); // Redirect non-admin users to the login page
        if (auth()->user()->level == 'admin') {
            return $next($request);
        }

        return redirect('/login');
    }
}
