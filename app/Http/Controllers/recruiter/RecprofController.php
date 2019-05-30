<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RecprofController extends Controller
{
    public function crecprofile(){
        if (Auth::guard('recruiter')->check()){
            return view('recruiter.CR-rprof');
        }
        else {
            return view('recruiter.home');
        }
    }
    
    
}
