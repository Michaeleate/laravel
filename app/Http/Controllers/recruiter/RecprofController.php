<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RecprofController extends Controller
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        //$this->middleware('guest:recruiter')->except('logout');
        //$this->middleware('auth:recruiter')->except('logout');
        $this->middleware('recruiter')->except('logout');
    }
    
    public function crecprofile(){
        $auth = Auth::guard('recruiter');
        //if (Auth::guard('recruiter')->check()){
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('recruiter.CR-rprof');
        }
        else {
            return view('recruiter.home');
        }
    }
    
    
}
