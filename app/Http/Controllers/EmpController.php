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
use App\modresuemp;

class EmpController extends Controller
{
    public function updateemp(Request $request){
        if (Auth::check())
        {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            
            $emp_name=$request->input('org5');
            
            if(null !== ($request->input('yearsexp5'))){
                if(null == ($request->input('monthsexp5'))){
                    $exp_months=$request->input('yearsexp5') * 12;
                }
                else{
                    $exp_months=($request->input('yearsexp5') * 12) + $request->input('monthsexp5');
                }
            }
            else{
                if(null == ($request->input('monthsexp5'))){
                    $exp_months=0;
                }
                else{
                    $exp_months=$request->input('monthsexp5');
                }
            }
            
            $desg=$request->input('role5');
            $startdt=$request->input('role5start');
            $enddt=$request->input('role5end');
            $lak=$request->input('role5sall');
            $tho=$request->input('role5salt');
            $msal=$lak*100000+$tho*1000;
            $resp=$request->input('resp');
            $nperiod=$request->input('notice5');
            
            $this->updatedb($authid,$emp_name,$exp_months,$desg,$startdt,$enddt,$msal,$resp,$nperiod);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('aem'=>$stat3));
            
        }
        else {
            return redirect()->route('login');
        }
    }

    private function updatedb($authid,$emp_name,$exp_months,$desg,$startdt,$enddt,$msal,$resp,$nperiod)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuemp::updateOrCreate(
               [
                'emp_id'    => $authid,
                'emp_name'  => $emp_name
               ],
               [ 
                'exp_months'    => $exp_months,
                'desg'      => $desg,
                'startdt'   => $startdt,
                'enddt'     => $enddt,
                'msal'      => $msal,
                'resp'      => $resp,
                'nperiod'   => $nperiod
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
