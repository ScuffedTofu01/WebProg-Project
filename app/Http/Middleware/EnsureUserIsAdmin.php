<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not logged in, redirect to login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Allow if the logged-in user's email matches ADMIN_EMAIL (case-insensitive)
        if (env('ADMIN_EMAIL') && strtolower(Auth::user()->email) === strtolower(env('ADMIN_EMAIL'))) {
            return $next($request);
        }

        // Otherwise deny access
        return redirect('/')->with('error', 'You are not authorized.');
    }
}
