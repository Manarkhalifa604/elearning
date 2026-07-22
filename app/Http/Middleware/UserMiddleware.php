<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('role') !== 'user') {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
