<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenumpangMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('user_role') !== 'penumpang') {
            return redirect()->route('sign'); // redirect ke login jika bukan penumpang
        }
        return $next($request);
    }
}
