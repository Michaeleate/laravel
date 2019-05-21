<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            //return redirect('/home');
            //Mike 21 May start
            $authtype = Auth::user_type();
            if($authtype=="1"){
                return redirect('/home');
            }
            else if($authtype=="2"){
                return redirect('/rechome');
            }
            //Mike 21 May end
        }

        return $next($request);
    }
}
