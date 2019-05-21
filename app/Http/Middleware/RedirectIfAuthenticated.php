<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

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
            if (Auth::check())
            {
                $user = Auth::user();
                $authtype = $user->user_type;
                if($authtype == 1){
                    return route('home');
                }
                else if($authtype == 2){
                    return route('rechome');
                }
                //Mike 21 May end
            }
        }

        return $next($request);
    }
}
