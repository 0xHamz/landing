<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Cek apakah session user_id ada
        if (!$request->session()->has('user_id')) {
            return redirect()->route('sign');
        }

        // Cek role jika diberikan
        if ($role && $request->session()->get('user_role') !== $role) {
            return redirect()->route('sign');
        }

        return $next($request);
    }
}
