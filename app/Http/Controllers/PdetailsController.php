<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\QueryException;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\MessageBag;
use Session;
use Validator;
use Debugbar;
use App\modresupdet;

class PdetailsController extends Controller
{
    public function updatepdet(Request $request) {
        if (Auth::check()) {
            $authid = Auth::id();
            session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
            //return redirect()->back()->with(array('stat'=>'Success','rt'=>'uppdet'));
            $fname=Auth::user()->name;
            $email=Auth::user()->email;
            $mobnum=Auth::user()->mob_num;
            $gender=$request->input('gender');
            
            $dob=$request->input('dob');
            if(empty($dob)){
                $dob1='0000-00-00';
                $dob1=strtotime($dob1);
                $dob=date("Y-m-d",$dob1);
            }
            $marstat=$request->input('marstat');
            $lang=$request->input('lang');
            //process for each language
            $lang_eng=$lang_tel=$lang_hin=$lang_oth='';
            if(is_array($lang)){
                foreach($lang as $language){
                    switch($language){
                        case "english":
                            $lang_eng="english";
                            break;
                        case "telugu":
                            $lang_tel="telugu";
                            break;
                        case "hindi":
                            $lang_hin="hindi";
                            break;
                        default:
                            $lang_oth=$language;
                            break;
                    }
                }

            }

            //Is he Differently Abled?
            $able1=$able2=$able3='';
            $abled=$request->input('abled');
            if($abled=="yes"){
                $diffable=$request->input('diffable');
                $i=1;
                if(is_array($diffable)){
                    foreach($diffable as $disorder){
                        if ($i==1){
                            $able1=$disorder;
                        }
                        else if($i==2){
                            $able2=$disorder;
                        }
                        else{
                            $able3=$disorder;
                        }
                        $i=$i+1;
                    }
                }
            }
            
            //Process this file later
            $profpic_flag="no";
            $profpic=$picpath=$picname='';
            if ($request->hasFile('fprofpic')){
                $profpic_flag="yes";
                $file = $request->file('fprofpic');
                //------------------------
                $oldname = $file->getClientOriginalName();
                $oldext = $file->getClientOriginalExtension();
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
                else if ($oldsize > 2000000){
                    $stat1 = 'size';
                    $msg1 = 'fail';
                }

                //If it is not valid file.
                if ($msg1 == 'fail'){
                    $profpic_flag="no";
                    if($stat1 == 'mime'){
                        $stat3 = '- Not valid file MIME Type.';
                    }
                    else if($stat1 == 'ext'){
                        $stat3 = '- Not valid file extension'.'_'.$oldext;
                    }
                    else if($stat1 == 'size'){
                        $stat3 = '- Not valid file Size'.'_'.$oldsize.' bytes';
                    }
                                                
                    // return redirect('user-profile')
                            // ->with(array('stat'=>$stat3));
                    
                    $profpic = '0';
                    $picpath = null;
                    $picname = null;
                    
                    //Update the database without prof pic data.
                    $this->updatedb($authid,$fname,$email,$mobnum,$gender,$dob,$marstat,$lang_eng,$lang_tel,$lang_hin,$lang_oth,$abled,$able1,$able2,$able3,$profpic,$picname,$picpath);

                    return redirect()->back()->withInput()
                                    ->with(array('stat'=>$stat3));
                }

                if($profpic_flag == "yes"){
                    $file_exist='no';
                    $file1='uploads/profpics'.$authid.'.jpeg';
                    if(is_file($file1))
                    {
                        Storage::delete($file1);
                        unlink($file1);
                        echo "File exist";
                        $file_exist='yes';
                    }
                    
                    if ($file_exist=="no"){
                        $file1='uploads/profpics'.$authid.'.jpg';
                        if(is_file($file1))
                        {
                            Storage::delete($file1);
                            unlink($file1);
                            echo "File exist";
                        }    
                    }

                    if($profpic_flag=='yes'){
                        $profpic='1';
                    }
                    else{
                        $profpic='0';
                    }

                    $picname = $oldname;
                    $picname1 = $authid.'.'.$oldext;
                    //Move Uploaded File
                    $picpath = 'uploads/profpics';
                    $file->move($picpath,$picname1);
                }
            }
            
            //If profile pic is not attached and trying to update other data.
            //Let's retain the profile pic
            if ($profpic_flag=="no"){
                
                $resume = \App\modresupdet::select('profpic','picpath','picname')
                    ->where('pdet1_id', '=', $authid)
                    ->get();

                foreach($resume as $key=>$val){
                    $profpic=$val["profpic"];
                    $picname=$val['picname'];
                    $picpath=$val['picpath'];
                }
            }
            
            //Update database
            $this->updatedb($authid,$fname,$email,$mobnum,$gender,$dob,$marstat,$lang_eng,$lang_tel,$lang_hin,$lang_oth,$abled,$able1,$able2,$able3,$profpic,$picname,$picpath);

            $stat3="- Saved";
            return redirect('user-profile')
                    ->with(array('up'=>$stat3));
        }
        else{
            return redirect()->route('login');
        }
    }

    private function updatedb($authid,$fname,$email,$mobnum,$gender,$dob,$marstat,$lang_eng,$lang_tel,$lang_hin,$lang_oth,$abled,$able1,$able2,$able3,$profpic,$picname,$picpath)
    {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresupdet::updateOrCreate(
               [
                'pdet_id'  => $authid
               ],
               [ 
                'fname'     => $fname,
                'email'     => $email,
                'mob_num'   => $mobnum,
                'gender'    => $gender,
                'dob'       => $dob,
                'marstat'   => $marstat,
                'eng_lang'  => $lang_eng,
                'tel_lang'  => $lang_tel,
                'hin_lang'  => $lang_hin,
                'oth_lang'  => $lang_oth,
                'diff_able' => $abled,
                'able1'     => $able1,
                'able2'     => $able2,
                'able3'     => $able3,
                'profpic'   => $profpic,
                'picpath'   => $picpath,
                'picname'   => $picname
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