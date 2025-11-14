<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleBk
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'bk') {
            return $next($request);
        }

        return redirect('/'); // kalau bukan BK, balik ke login
    }
}
