<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
    
    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('recruiter.home');
    }
}
