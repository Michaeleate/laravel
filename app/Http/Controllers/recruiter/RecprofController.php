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
    //Authorize right users
    public function __construct()
    {
        $this->middleware('recruiter')->except('logout');
    }
    
    //Create Recruiter Profile
    public function crecprofile(){
        $auth = Auth::guard('recruiter');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('recruiter.rpostprof');
        }
        else {
            return view('recruiter.home');
        }
    }
    
    //View Recruiter Profile
    public function vrecprofile(){
        $auth = Auth::guard('recruiter');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('recruiter.rviewprof');
        }
        else {
            return view('recruiter.home');
        }
    }
    
}
