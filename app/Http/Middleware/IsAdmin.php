<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next isadmin
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('user')) {
            $user_info = session('user');
            if ($user_info['isadmin']) {
                return $next($request);
            }
            abort(403, 'Unauthorized action.');
        }
    }
}
