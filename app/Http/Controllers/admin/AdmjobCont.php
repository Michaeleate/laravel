<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Debugbar;
use Illuminate\Support\Carbon;
use \App\Http\Controllers\PostsController;
use App\modjobpost;

class AdmjobCont extends Controller
{
    /**
    * Create a new controller instance.
     *
     * @return void
     */
    //Authorize right users
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

    public function admpostjob(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('admin')->check()){
            $authid = Auth::guard('admin')->user()->id;
            $message = "Admin Auth ID is " . $authid;
            echo "<script type='text/javascript'>alert('$message');</script>";

            //get recruiter id, as admin is posting as recruiter now.
            $admrecid=0;
            $admrecid=PostsController::get_admrecid($authid);

            $maxjobid=PostsController::get_maxjobid();
            /*
            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
            }
            */
            
            $current_timestamp=Carbon::now()->toDateTimeString();

            $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';

            if($maxjobid==0){
                $job_id=1000;    
            }
            else{
                $job_id=$maxjobid+1;
            }
            
            $authid=$admrecid->id;
            $jtitle=$request->input('jtitle');
            $jd=$request->input('jobdesc');
            $qty=1;
            $keywords=$request->input('jkey');
            $minexp=$request->input('minexp');
            $maxexp=$request->input('maxexp');
            $minsal=$request->input('minsalt');
            $maxsal=$request->input('maxsalt');
            $hireloc=$request->input('hireloc');
            if(isset($hireloc[0])){
                $hireloc1=$hireloc[0];
            }
            if(isset($hireloc[1])){
                $hireloc2=$hireloc[1];
            }
            
            if(isset($hireloc[2])){
                $hireloc3=$hireloc[2];
            }

            $comhirefor=$request->input('hirecomp');
            //Change this later to 0, so that admin can see and approve to status 1
            //$jstatus=0;
            $jstatus=1;
            $valid_till=Carbon::now()->addDays(30)->toDateTimeString();
            $auto_aprove="no";
            $auto_upd="no";
            
            $this->updatedb($authid, $job_id, $jtitle, $jd,  $qty, $keywords, $minexp, $maxexp, $minsal, $maxsal, $hireloc, $hireloc1, $hireloc2, $hireloc3, $comhirefor, $jstatus, $valid_till, $auto_aprove, $auto_upd);

            $url_info = 'success';
            return redirect('/admin/vlastjob')
                    ->with(array('link'=>$url_info));
        }
        else { 
            return view('mikeadmin');    
        }
    }

    private function updatedb($authid, $job_id, $jtitle, $jd,  $qty, $keywords, $minexp, $maxexp, $minsal, $maxsal, $hireoc, $hireloc1, $hireloc2, $hireloc3, $comhirefor, $jstatus, $valid_till, $auto_aprove, $auto_upd)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modjobpost::updateOrCreate(
               [
                'rec_id'    => $authid,
                'job_id'    => $job_id
               ],
               [ 
                'jtitle'    => $jtitle,
                'jd'        => $jd,
                'qty'       => $qty,
                'keywords'  => $keywords,
                'minexp'    => $minexp,
                'maxexp'    => $maxexp,
                'minsal'    => $minsal,
                'maxsal'    => $maxsal,
                'hireloc1'  => $hireloc1,
                'hireloc2'  => $hireloc2,
                'hireloc3'  => $hireloc3,
                'comhirefor'    => $comhirefor,
                'jstatus'       => $jstatus,
                'valid_till'    => $valid_till,
                'auto_aprove'   => $auto_aprove,
                'auto_upd'      => $auto_upd,
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }

    //View last posted job
    public function vlastjob(Request $request){
        $auth = Auth::guard('admin');
        if ($auth->check()){
            //$message = "Inside crecprofile of RecprofController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('admin.asviewjob');
        }
        else {
            return redirect('/mikeadmin');
        }
    }

    /*
    public function postjobsuccess(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

            $lastjobdet=PostsController::get_lastjobdet();
            
            foreach($lastjobdet as $key=>$val){
                $job_id=$val["job_id"];
                $jtitle=$val["jtitle"];
                $jd=$val["jd"];
                $qty=$val["qty"];
                $keywords=$val["keywords"];
                $minexp=$val["minexp"];
                $maxexp=$val["maxexp"];
                $minsal=$val["minsal"];
                $maxsal=$val["maxsal"];
                $hireloc1=$val["hireloc1"];
                $hireloc2=$val["hireloc2"];
                $hireloc3=$val["hireloc3"];
                $comhirefor=$val["comhirefor"];
                $jstatus=$val["jstatus"];
                $valid_till=$val["valid_till"];
                $auto_aprove=$val["auto_aprove"];
                $auto_upd=$val["auto_upd"];
                $created_at=$val["created_at"];
                $updated_at=$val["updated_at"];
            }
            
            
            if(isset($hireloc[2])){
                $hireloc3=$hireloc[2];
            }

            $url_info = 'success';
            return redirect('/recruiter/postjobsuccess')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter');    
        }
    }
    
    */

    public function valljobs(){
        $job_id=$jtitle=$jd=$qty=$keywords=$minexp=$maxexp=$minsal=$maxsal=$hireoc=$hireloc1=$hireloc2=$hireloc3=$comhirefor=$jstatus=$valid_till=$auto_aprove=$auto_upd='';
    
        $recalljobs=PostsController::get_recalljobs();
        
        return view('admin.aaviewjob',compact('recalljobs'));
    }
}
