<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\QueryException;
use App\modresuhead;

class HeadlineController extends Controller
{
    public function updatehead(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            
            $ta1=$request->input('headline');
            $this->create($authid,$ta1);
            
            $stat3="- Saved";
            return redirect('user-profile')
                ->with(array('hl'=>$stat3));
            
            /*return view('users.CR_prof')->with(array('stat'=>'- Update Success','rt'=>'updatehead'));
            return view('users.CR_prof');*/
            
        }
        else {
            return redirect()->route('login');
        }

    }

    protected function create($authid,$ta1)
    {
        //$reshline = DB::table('resuhead')->where('head_id', $authid)->first();

        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuhead::updateOrCreate(
                ['head_id' => $authid], 
                ['head_line' => $ta1]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }
     
}