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
    /*
    Tested this.
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (Auth::guard($guard)->check()) {
            if ($guard == 'recruiter') {
                return redirect()->route('recruiter.home');
            }
            return redirect()->route('home');
        }
        
        return $next($request);
    }
    */
    //Test this logic
    public function handle($request, Closure $next, $guard = null)
    {
        
        if (Auth::guard('recruiter')->check()) {
            //$message = "In redirectifauthenticated recruiter guard";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return redirect('/recruiter/home');
        }

        if (Auth::guard($guard)->check()) {
            //$message = "In redirectifauthenticated second guard";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return redirect('/home');
        }

        //$message = "In redirectifauthenticated next guard";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        return $next($request);
    }
}
