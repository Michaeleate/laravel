<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\QueryException;
use Illuminate\Support\MessageBag;
use Session;
use Debugbar;
use App\modresukskil;

class KeySkillsController extends Controller
{
    public function updatekskills(Request $request) {
        session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
        //return redirect()->back()->with(array('stat'=>'Success','rt'=>'updatekey'));

        if (Auth::check()) {
            $authid = Auth::id();
            $kskill=$request->input('keyskill');

            //echo $kskill[3];
            $this->updatedb($authid,$kskill);

            $stat3 = '- Saved';
            return redirect('user-profile')
                    ->with(array('uk'=>$stat3));
        }
        else {
            return redirect()->route('login');    
        }
    }

    private function updatedb($authid,$kskill)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresukskil::updateOrCreate(
               [
                'kskil_id'  => $authid
               ],
               [ 
                'kskil1'  => $kskill[0],
                'kskil2'  => $kskill[1],
                'kskil3'  => $kskill[2],
                'kskil4'  => "",
                'kskil5'  => ""
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