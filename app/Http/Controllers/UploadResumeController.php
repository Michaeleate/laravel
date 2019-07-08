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
use App\modresuload;

class UploadResumeController extends Controller
{
     public function uploadresume(Request $request) {
          if (Auth::check()) {
               $authid = Auth::id();        
               session()->forget(array('hl','ares','uk','up','aed10','aed12','aedgrad','aedpg','aem','aca','apa','ar1','ar2'));
               //retrieve the uploaded file
               if ($request->hasFile('resume')){
                    $file = $request->file('resume');

                    $validator = Validator::make($request->all(), [
                         'resume' => 'required',
                    ]);
                    
                    if ($validator->fails()) {
                         return redirect('user-profile')
                                        ->with(array('ares'=>'- No File Name'));

                    }
                    else {
                         $oldname = $file->getClientOriginalName();
                         $oldext = $file->getClientOriginalExtension();
                         $oldpath = $file->getRealPath();
                         $oldmime = $file->getMimeType();
                         $oldsize = $file->getSize();
                         $stat1 = '';
                         $msg1 = '';

                         if (!($oldmime == 'text/plain' || $oldmime == 'application/msword' || $oldmime == 'application/pdf' || $oldmime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')){
                              $stat1 = 'mime';
                              $msg1 = 'fail';
                         }
                         else if (!($oldext == 'txt' || $oldext == 'doc' ||$oldext == 'docx' || $oldext == 'pdf')) {
                              $stat1 = 'ext';
                              $msg1 = 'fail';
                         }
                         else if ($oldsize > 200000){
                              $stat1 = 'size';
                              $msg1 = 'fail';
                         }

                         if ($msg1 == 'fail'){
                              if($stat1 == 'mime'){
                                   $stat3 = '- Not valid file MIME Type';
                              }
                              else if($stat1 == 'ext'){
                                   $stat3 = '- Not valid file extension'.'_'.$oldext;
                              }
                              else if($stat1 == 'size'){
                                   $stat3 = '- Not valid file Size'.'_'.$oldsize;
                              }
                                                            
                              return redirect('user-profile')
                                        ->with(array('ares'=>$stat3));
                         }
                         else{
                              //Check if file exists in storage or not.
                              
                              $file_exist='no';
                              $file1='uploads/'.$authid.'.txt';
                              if(is_file($file1))
                              {
                                   Storage::delete($file1);
                                   unlink($file1);
                                   echo "File exist";
                                   $file_exist='yes';
                              }
                              
                              if ($file_exist=='no'){
                                   $file1='uploads/'.$authid.'.doc';
                                   if(is_file($file1))
                                   {
                                        Storage::delete($file1);
                                        unlink($file1);
                                        echo "File exist";
                                        $file_exist='yes';
                                   }    
                              }

                              if ($file_exist=='no'){
                                   $file1='uploads/'.$authid.'.docx';
                                   if(is_file($file1))
                                   {
                                        Storage::delete($file1);
                                        unlink($file1);
                                        echo "File exist";
                                        $file_exist='yes';
                                   }    
                              }

                              
                              //If file exists;
                              
                              $newname = $authid.'.'.$oldext;
                              //Move Uploaded File
                              $newpath = 'uploads';
                              $file->move($newpath,$newname);
                              //Update Database
                              
                              $this->updatedb($authid,$oldname,$newname,$newpath);

                              //Testing purpose
                              //$stat3 = '- DB Updated'.'_'.$oldname.'_'.$newname.'_'.$newpath;
                              $stat3 = '- Saved';
                              return redirect('user-profile')
                                        ->with(array('ares'=>$stat3));
                         }
                    }
               }
               else {
                    $stat3 = '- File is not selected';
                    return redirect('user-profile')
                                        ->with(array('ares'=>$stat3));
               }
          }
          else {
               return redirect()->route('login');
          }
     }

     private function updatedb($authid,$oldname,$newname,$newpath)
     {
        try{
            DB::beginTransaction();
            
            #updateorCreate
            // If there's a record update.
            // If no matching model exists, create one.
            $head = \App\modresuload::updateOrCreate(
               [
                'resu_id'  => $authid
               ],
               [ 
                'oldresu'  => $oldname,
                'newresu'  => $newname,
                'resupath' => $newpath
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