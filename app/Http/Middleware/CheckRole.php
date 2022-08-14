<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard)
    {
        if (!Auth::guard($guard)->check()) {
            if ($guard === 'web') {
                return redirect()->route('login');
            } else if ($guard === 'laundry') {
                return redirect()->route('laundry.login');
            } else if ($guard === 'admin') {
                return redirect()->route('admin.login');
            } else if ($guard === 'courier') {
                return redirect()->route('courier.login');
            }
        }

        return $next($request);
    }
}
