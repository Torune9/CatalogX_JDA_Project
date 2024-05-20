<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$guard=null): Response
    {
        if (Auth::guard($guard)->check()) {
            // Jika pengguna sudah masuk, arahkan mereka ke rute yang sesuai
            return redirect('/stores'); // Ganti '/home' dengan rute yang sesuai
        }
        return $next($request);
    }
}