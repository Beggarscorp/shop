<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'You must be logged in to access this page.');
        }
        
        // Check if the logged-in user has the required role
        if (Auth::user()->role !== $role) {
            return redirect()->route('auth.login')->with('error', 'You do not have permission to access this page.');
        }

        // If role matches, allow request to proceed
        return $next($request);
    }
}
