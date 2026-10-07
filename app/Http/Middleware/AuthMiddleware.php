<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    //   @param string $role

    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (strcasecmp(Auth::user()->role, $role) !== 0) {
        abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
}
        return $next($request);
    }
}
