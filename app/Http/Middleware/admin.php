<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
        //$message = "In middleware admin guard outside if";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        if(Auth::guard('admin')->check()){
            //$message = "In middleware admin guard";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return $next($request);
        }
        
        //echo "In middleware admin outside guard";
        return redirect('admin')->with('error','Please Login as Admin');
    }
}
