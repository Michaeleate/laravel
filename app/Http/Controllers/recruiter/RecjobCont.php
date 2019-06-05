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
use Illuminate\Support\Facades\Session;
use Debugbar;
use Illuminate\Support\Carbon;
use \App\Http\Controllers\PostsController;
use App\modjobpost;

class RecjobCont extends Controller
{
    public function recpostjob(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

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
            
            $jtitle=$request->input('jtitle');
            $jd=$request->input('jobdesc');
            $qty=0;
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
            $jstatus=0;
            $valid_till=Carbon::now()->addDays(30)->toDateTimeString();
            $auto_aprove="no";
            $auto_upd="no";
            
            $this->updatedb($authid, $job_id, $jtitle, $jd,  $qty, $keywords, $minexp, $maxexp, $minsal, $maxsal, $hireloc, $hireloc1, $hireloc2, $hireloc3, $comhirefor, $jstatus, $valid_till, $auto_aprove, $auto_upd);

            $url_info = 'posted';
            return redirect('/postjob')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter');    
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

}
