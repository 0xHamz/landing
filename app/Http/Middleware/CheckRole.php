<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user_role = Session::get('user_role');

        if (!$user_role || $user_role !== $role) {
            // Jika role tidak sesuai → redirect ke login/sign
            return redirect()->route('sign');
        }

        return $next($request);
    }
}
