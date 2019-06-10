<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegUserProfController extends Controller
{
    public function createprofile(){
        if (Auth::check()) {
            return view('users.CR_prof');
        }
        else {
            return redirect()->route('login');
        }
    }
    
    public function viewprofile(){
        if (Auth::check()) {
            return view('users.RD_prof');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function editprofile(){
        if (Auth::check()) {
            return view('users.MD_prof');
        }
        else {
            return redirect()->route('login');
        }
    }

    public function editprofvisible(){
        if (Auth::check()) {
            return view('users.MD_visible');
        }
        else {
            return redirect()->route('login');
        }
    }
}
