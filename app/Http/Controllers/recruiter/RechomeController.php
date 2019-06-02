<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RechomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:recruiter');
        $this->middleware('recruiter')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::guard('recruiter');
        //if (Auth::guard('recruiter')->check()){
        if ($auth->check()){
            return view('recruiter.home');
        }
    }
}