<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('recruiter.home');
    }
}
