<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request the application request
     * @param \Closure                 $next    the callback after middleware
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() or $request->user()->role_id !=config('define.role_admin')) {
            return redirect()->route('home')->with(trans('auth.info'), trans('auth.not_admin'));
            ;
        }
        return $next($request);
    }
}
