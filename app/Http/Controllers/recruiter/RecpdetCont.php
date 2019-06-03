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
use Illuminate\Support\Facades\Cache;
use Debugbar;
use App\recruiter\modrecpdet;
use \App\Http\Controllers\PostsController;
use App\recruiter\modrecbdet;
use App\recruiter\modrecabout;
use App\recruiter\modrecsocio;
use App\recruiter\modrecsarea;
use App\recruiter\modrecedu;
use App\recruiter\modrecemp;
use App\recruiter\modrecref;

class RecpdetCont extends Controller
{
    public function upinfopdet(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

            $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
            $recprof=PostsController::get_initial();
            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
                $lname=$val["lname"];
                $location=$val["location"];
                $email=$val["email"];
                $mobnum=$val["mobnum"];
                $skype=$val["skype"];
                $picpath=$val["picpath"];
                $picname=$val["picname"];
            }
            $fname=$request->input('fname');
            $lname=$request->input('lname');
            $location=$request->input('loc');
            $mobnum=$request->input('mobnum');

            $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);

            $url_info = 'init';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    public function upinfopdet1(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

            $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
            $recprof=PostsController::get_initial();
            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
                $lname=$val["lname"];
                $location=$val["location"];
                $email=$val["email"];
                $mobnum=$val["mobnum"];
                $skype=$val["skype"];
                $picpath=$val["picpath"];
                $picname=$val["picname"];
            }
            $mobnum=$request->input('mobnum');
            $email=$request->input('email');

            $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);
            
            $url_info = 'emailpass';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    public function upinfopdet2(Request $request){
        //$message = "In upinfopdet of RecpdetCont";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            //$message = "ID is" . $authid;
            //echo "<script type='text/javascript'>alert('$message');</script>";

            $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
            $recprof=PostsController::get_initial();
            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
                $lname=$val["lname"];
                $location=$val["location"];
                $email=$val["email"];
                $mobnum=$val["mobnum"];
                $skype=$val["skype"];
                $picpath=$val["picpath"];
                $picname=$val["picname"];
            }
            $fname=$request->input('fname');
            $lname=$request->input('lname');

            $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);
            
            $url_info = 'personal';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    public function updatecom(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;

            $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
            $recprof=PostsController::get_initial();

            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
                $lname=$val["lname"];
                $location=$val["location"];
                $email=$val["email"];
                $mobnum=$val["mobnum"];
                $skype=$val["skype"];
                $picpath=$val["picpath"];
                $picname=$val["picname"];
            }
            $mobnum=$request->input('mobnum');
            $skype=$request->input('skype');

            $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);
            
            $url_info = 'comm';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    public function uprecphoto(Request $request){
        session()->forget(array('link'));
        $message = "In uprecphoto of RecpdetCont";
        echo "<script type='text/javascript'>alert('$message');</script>";
        if (Auth::guard('recruiter')->check()){
            $message = "In guard if uprecphoto of RecpdetCont";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $authid = Auth::guard('recruiter')->user()->id;

            $fname=$lname=$loc=$email=$mobnum=$skype=$picpath=$picname='';
            $recprof=PostsController::get_initial();

            foreach($recprof as $key=>$val){
                $fname=$val["fname"];
                $lname=$val["lname"];
                $location=$val["location"];
                $email=$val["email"];
                $mobnum=$val["mobnum"];
                $skype=$val["skype"];
                $picpath=$val["picpath"];
                $picname=$val["picname"];
            }
            //Process this file later
            $profpic_flag="no";
            if ($request->hasFile('profpic')){
                $message = "In uprecphoto file is there";
                echo "<script type='text/javascript'>alert('$message');</script>";
                $profpic_flag="yes";
                $file = $request->file('profpic');

                $oldname = $file->getClientOriginalName();
                $oldext  = $file->getClientOriginalExtension();
                $oldpath = $file->getRealPath();
                $oldmime = $file->getMimeType();
                $oldsize = $file->getSize();
                $stat1 = '';
                $msg1 = '';

                if (!($oldmime == 'image/jpeg')){
                    $stat1 = 'mime';
                    $msg1 = 'fail';
                }
                else if (!($oldext == 'jpeg' || $oldext == 'jpg')) {
                    $stat1 = 'ext';
                    $msg1 = 'fail';
                }
                else if ($oldsize > 1000000){
                    $stat1 = 'size';
                    $msg1 = 'fail';
                }

                //If it is not valid file.
                if ($msg1 == 'fail'){
                    $profpic_flag="no";
                    if($stat1 == 'mime'){
                        $stat3 = '- Not valid file MIME Type';
                    }
                    else if($stat1 == 'ext'){
                        $stat3 = '- Not valid file extension'.'_'.$oldext;
                    }
                    else if($stat1 == 'size'){
                        $stat3 = '- Not valid file Size'.'_'.$oldsize;
                    }
                                                
                    //return redirect('user-profile')
                    //        ->with(array('stat'=>$stat3));

                    return redirect()->back();
                }

                if($profpic_flag=="yes"){
                    $file_exist='no';
                    $file1='uploads/rec/profpics'.$authid.'.jpeg';
                    if(is_file($file1))
                    {
                        Storage::delete($file1);
                        unlink($file1);
                        echo "File exist";
                        //Cache::forget('key');
                        //Cache::flush();
                        $file_exist='yes';
                    }
                    
                    if ($file_exist=="no"){
                        $file1='uploads/rec/profpics'.$authid.'.jpg';
                        if(is_file($file1))
                        {
                            Storage::delete($file1);
                            unlink($file1);
                            echo "File exist";
                            //Cache::flush();
                        }    
                    }

                    $picname = $oldname;
                    $picname1 = $authid.'.'.$oldext;
                    //Move Uploaded File
                    $picpath = 'uploads/rec/profpics';
                    $file->move($picpath,$picname1);

                    $this->updatedb($authid,$fname,$lname,$location,$mobnum,$email,$skype,$picname,$picpath);
            
                    $url_info = 'photo';
                    return redirect('/recruiter/crecprofile')
                            ->with(array('link'=>$url_info));
                }
                else {
                    $url_info = 'socio';
                    return redirect('/recruiter/crecprofile')
                            ->with(array('link'=>$url_info));
                }    
            }
            else {
                $url_info = 'socio';
                return redirect('/recruiter/crecprofile')
                        ->with(array('link'=>$url_info));
            }
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

    public function upinfobdet(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;

            $orgname=$weburl=$addline1=$addline2=$city=$state=$country='';
            
            $orgname=$request->input('orgname');
            $weburl=$request->input('weburl');
            $addline1=$request->input('addline1');
            $addline2=$request->input('addline2');
            $city=$request->input('city');
            $state=$request->input('state');
            $country=$request->input('country');

            $this->upbdetdb($authid,$orgname,$weburl,$addline1,$addline2,$city,$state,$country);
            
            $url_info = 'business';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    private function upbdetdb($authid,$orgname,$weburl,$addline1,$addline2,$city,$state,$country)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecbdet::updateOrCreate(
               [
                'rec_id'  => $authid
               ],
               [ 
                'orgname'   => $orgname,
                'weburl'    => $weburl,
                'addline1'  => $addline1,
                'addline2'  => $addline2,
                'city'      => $city,
                'state'     => $state,
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

    public function uprecabout(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;

            $profname=$profurl=$shortprof=$servcity=$servstate=$servcountry=$remote='';
            
            $profname=$request->input('profname');
            $profname1=strtolower($profname);
            $profurl=str_replace(' ','-',$profname1);
            $shortprof=$request->input('shortprof');
            $charges=null;
            $servcity=$request->input('servcity');
            $servstate=$request->input('servstate');
            $servcountry=$request->input('servcountry');
            $remote=$request->input('remote');

            $this->upaboutdb($authid,$profname,$profurl,$shortprof,$charges, $servcity,$servstate,$servcountry,$remote);
            
            $url_info = 'aboutu';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    private function upaboutdb($authid,$profname,$profurl,$shortprof,$charges, $servcity,$servstate,$servcountry,$remote)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecabout::updateOrCreate(
               [
                'rec_id'  => $authid
               ],
               [ 
                'profname'      => $profname,
                'profurl'       => $profurl,
                'shortprof'     => $shortprof,
                'charges'       => $charges,
                'servcity'      => $servcity,
                'servstate'     => $servstate,
                'servcountry'   => $servcountry,
                'remote'        => $remote
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }

    public function updatesoc(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;

            $linkurl=$fburl=$tweeturl=$instaurl=$lang1=$lang2=$lang3='';
            
            $linkurl=$request->input('profname');
            $fburl=$request->input('fburl');
            $tweeturl=$request->input('tweeturl');
            $instaurl=$request->input('instaurl');
            $lang1=$request->input('lang1');
            $lang2=$request->input('lang2');
            $lang3=$request->input('lang3');

            $this->upsocdb($authid,$linkurl,$fburl,$tweeturl,$instaurl,$lang1,$lang2,$lang3);
            
            $url_info = 'socio';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    private function upsocdb($authid,$linkurl,$fburl,$tweeturl,$instaurl,$lang1,$lang2,$lang3)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecsocio::updateOrCreate(
               [
                'rec_id'  => $authid
               ],
               [ 
                'linkurl'   => $linkurl,
                'fburl'     => $fburl,
                'tweeturl'  => $tweeturl,
                'instaurl'  => $instaurl,
                'lang1'     => $lang1,
                'lang2'     => $lang2,
                'lang3'     => $lang3,
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }

    public function uprecsarea(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;

            $sarea1=$sarea2=$sarea3=$sainfo=$sapos=$saclients='';
            
            $sarea=$request->input('sarea');
            $sainfo=$request->input('sainfo');
            $sapos=$request->input('sapos');
            $saclients=$request->input('saclients');

            $this->upsareadb($authid,$sarea,$sainfo,$sapos,$saclients);
            
            $url_info = 'sarea';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');    
        }
    }

    private function upsareadb($authid,$sarea,$sainfo,$sapos,$saclients)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecsarea::updateOrCreate(
               [
                'rec_id'  => $authid
               ],
               [ 
                'sarea1'    => $sarea[0],
                'sarea2'    => $sarea[1],
                'sarea3'    => $sarea[2],
                'sainfo'    => $sainfo,
                'sapos'     => $sapos,
                'saclients' => $saclients,
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }

    public function uprecxth(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            $qual1=$board1=$pyear1=$colname1=$edulang1=$percentage1=$edutime1='';
            $qual=$request->input('qual1');
            $board=$request->input('board1');
            $pyear=$request->input('passyear1');
            $edulang=$request->input('medium1');
            $percentage=$request->input('marks1');
            $colname=$request->input('college1');
            $course='';
            $spec='';
            $district='';
            $cortype='';
            
            $this->upedudb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $url_info = '10th';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    public function uprecxiith(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            $qual2=$board2=$pyear2=$colname2=$edulang2=$percentage2=$edutime2='';
            $qual=$request->input('qual2');
            $board=$request->input('board2');
            $pyear=$request->input('passyear2');
            $edulang=$request->input('medium2');
            $percentage=$request->input('marks2');
            $colname=$request->input('college2');
            $course='';
            $spec='';
            $district='';
            $cortype='';
            
            $this->upedudb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $url_info = '12th';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    public function uprecgrad(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            
            $qual=$request->input('qual3');
            $board='';
            $course=$request->input('course3');
            $spec=$request->input($course);
            $colname=$request->input('college3');
            $district=$request->input('district3');
            $cortype=$request->input('coursetype3');
            $pyear=$request->input('passyear3');
            $edulang=$request->input('medium3');
            $percentage=$request->input('marks3');

            $this->upedudb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $url_info = 'grad';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    public function uprecpg(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            
            $qual=$request->input('qual4');
            $board='';
            $course=$request->input('course4');
            $spec=$request->input($course);
            $colname=$request->input('college4');
            $district=$request->input('district4');
            $cortype=$request->input('coursetype4');
            $pyear=$request->input('passyear4');
            $edulang=$request->input('medium4');
            $percentage=$request->input('marks4');

            $this->upedudb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage);

            $url_info = 'pg';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    private function upedudb($authid,$qual,$board,$course,$spec,$colname,$district,$cortype,$pyear,$edulang,$percentage)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecedu::updateOrCreate(
               [
                'rec_id'    => $authid,
                'qual'      => $qual
               ],
               [ 
                'board'     => $board,
                'course'    => $course,
                'spec'      => $spec,
                'colname'   => $colname,
                'district'  => $district,
                'cortype'   => $cortype,
                'pyear'     => $pyear,
                'edulang'   => $edulang,
                'percentage' => $percentage
               ]
            );
            
            DB::commit();
        }
        catch(Exception $e){
            // Something went wrong so rollback.
            DB::rollback();
        }
    }

    public function uprecemp(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            
            $emp_name=$request->input('org5');
            $desg=$request->input('role5');
            $startdt=$request->input('role5start');
            $enddt=$request->input('role5end');
            $lak=$request->input('role5sall');
            $tho=$request->input('role5salt');
            $msal=$lak*100000+$tho*1000;
            $resp=$request->input('resp');
            $nperiod=$request->input('notice5');
            
            $this->upempdb($authid,$emp_name,$desg,$startdt,$enddt,$msal,$resp,$nperiod);

            $url_info = 'emp';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    private function upempdb($authid,$emp_name,$desg,$startdt,$enddt,$msal,$resp,$nperiod)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecemp::updateOrCreate(
               [
                'rec_id'    => $authid,
                'emp_name'  => $emp_name
               ],
               [ 
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

    public function uprecref1(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            
            $refnum="1";
            $fname=$request->input('refname1');
            $location=$request->input('refloc1');
            $email=$request->input('refmail1');
            $mobnum=$request->input('refmob1');
            
            $this->uprefdb($authid, $refnum, $fname, $location, $email, $mobnum);

            $url_info = 'ref';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    public function uprecref2(Request $request){
        session()->forget(array('link'));
        if (Auth::guard('recruiter')->check()){
            $authid = Auth::guard('recruiter')->user()->id;
            
            $refnum="2";
            $fname=$request->input('refname2');
            $location=$request->input('refloc2');
            $email=$request->input('refmail2');
            $mobnum=$request->input('refmob2');
            
            $this->uprefdb($authid, $refnum, $fname, $location, $email, $mobnum);

            $url_info = 'ref';
            return redirect('/recruiter/crecprofile')
                    ->with(array('link'=>$url_info));
        }
        else {
            return view('recruiter.home');
        }
    }

    private function uprefdb($authid, $refnum, $fname, $location, $email, $mobnum)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\recruiter\modrecref::updateOrCreate(
               [
                'rec_id'    => $authid,
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
