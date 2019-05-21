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
use App\modresuadd;

class AddController extends Controller
{
    public function updatecadd(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $addtype="C";
            $addline1=$request->input('addline1');
            $addline2=$request->input('addline2');
            $city=$request->input('city1');
            $state=$request->input('state1');
            $zcode=$request->input('zcode1');
            $country=$request->input('country1');
            
            $this->updatedb($authid, $addtype, $addline1, $addline2, $city, $state, $zcode, $country);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aca'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    public function updatepadd(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('stat','rt'));
            
            $addtype="P";
            $addline1=$request->input('addline3');
            $addline2=$request->input('addline4');
            $city=$request->input('city2');
            $state=$request->input('state2');
            $zcode=$request->input('zcode2');
            $country=$request->input('country2');
            
            $this->updatedb($authid, $addtype, $addline1, $addline2, $city, $state, $zcode, $country);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('apa'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    private function updatedb($authid, $addtype, $addline1, $addline2, $city, $state, $zcode, $country)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuadd::updateOrCreate(
               [
                'add_id'    => $authid,
                'addtype'   => $addtype
               ],
               [ 
                'addline1'  => $addline1,
                'addline2'  => $addline2,
                'city'      => $city,
                'state'     => $state,
                'zcode'     => $zcode,
                'country'   => $country
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