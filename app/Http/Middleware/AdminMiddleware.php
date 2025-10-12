<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
    
            if ($userRole == 'Super_admin' || $userRole == 'Admin') {
                return $next($request);
            }
        }
    
        return redirect('/')->with('error', 'Logged in as a Guest.');
    }
}
