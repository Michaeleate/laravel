<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecprofController extends Controller
{
    public function crecprofile(){
        if (Auth::check()) {
            $user = Auth::user();
            $authtype=$user->user_type;
            if($authtype==2){
                return view('users.CR-rprof');
            }
            else{
                return redirect()->route('login');    
            }
        }
        else {
            return redirect()->route('login');
        }
    }
}
