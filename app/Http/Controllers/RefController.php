<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Debugbar;
use App\modresuref;

class RefController extends Controller
{
    public function updateref1(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $refnum="1";
            $fname=$request->input('refname1');
            $location=$request->input('refloc1');
            $email=$request->input('refmail1');
            $mobnum=$request->input('refmob1');
            
            $this->updatedb($authid, $refnum, $fname, $location, $email, $mobnum);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('ar1'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updateref2(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $refnum="2";
            $fname=$request->input('refname2');
            $location=$request->input('refloc2');
            $email=$request->input('refmail2');
            $mobnum=$request->input('refmob2');
            
            $this->updatedb($authid, $refnum, $fname, $location, $email, $mobnum);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('ar2'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    private function updatedb($authid, $refnum, $fname, $location, $email, $mobnum)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuref::updateOrCreate(
               [
                'ref_id'    => $authid,
                'refnum'    => $refnum
               ],
               [ 
                'fname'     => $fname,
                'location'  => $location,
                'email'     => $email,
                'mobnum'    => $mobnum
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }
}
