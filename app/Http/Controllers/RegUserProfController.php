<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegUserProfController extends Controller
{
    public function createprofile(){
        if (Auth::check()) {
            return view('users.cpostprof');
        }
        else {
            return redirect()->route('login');
        }
    }
    
    public function viewprofile(){
        if (Auth::check()) {
            return view('users.cviewprof');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function editprofile(){
        if (Auth::check()) {
            return view('users.cmodprof');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function editprofvisible(){
        if (Auth::check()) {
            return view('users.cprofvisib');
        }
        else {
            return redirect()->route('login');
        }
    }
}
