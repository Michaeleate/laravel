<?php

namespace App\Http\Controllers\recruiter;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\QueryException;
use Debugbar;
use App\recruiter\modrecpdet;

class RecpdetCont extends Controller
{
    public function upinfopdet(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";

        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $location=$request->input('loc');
            $mobnum=$request->input('mobnum');
            $email='';
            $skype='';
            $picname='';
            $picpath='';

            $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);

            //$stat3 = '- Saved';
            //return redirect('user-profile')
            //        ->with(array('uk'=>$stat3));
        }
        else {
            return view('recruiter.home');    
        }
    }

    private function updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecpdet::updateOrCreate(
               [
                'rec_id'  => $authid
               ],
               [ 
                'fname'     => $fname,
                'lname'     => $lname,
                'location'  => $location,
                'email'     => $email,
                'mobnum'    => $mobnum,
                'skype'     => $skype,
                'picname'   => $picname,
                'picpath'   => $picpath
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
