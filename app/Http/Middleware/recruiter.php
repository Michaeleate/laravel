<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class recruiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'recruiter')
    {
        if(Auth::guard('recruiter')){
            $message = "In middleware recruiter guard";
            echo "<script type='text/javascript'>alert('$message');</script>";
            return $next($request);
        }
        
        echo "In middleware recruiter outside guard";
        //return redirect('recruiter')->with('error','Please Login as Recruiter');
    }
}