<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class mailController extends Controller
{
    //Send basic mail
    public function basic_email() {
        $data = array('name'=>"SAMS Jobs");
     
        Mail::send(['text'=>'users.mail'], $data, function($message) {
           $message->to('callforsams@gmail.com', 'SAMS Pvt Ltd')->subject
              ('Test Mail from SAMS Website');
           $message->from('ursams.hr@gmail.com','SAMS Jobs');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
     
     //Send html mail
     public function html_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel HTML Testing Mail');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
     
     //Send mail with attachment.
     public function attachment_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel Testing Mail with Attachment');
           $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
           $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }
     
     //Send 200 Credits introduction mail.
     public static function add200_email($user) {
        $data = array('name'=>$user->name,'email'=>$user->email);
        Mail::send('users.mail200', $data, function($message) use ($data) {
           $message->to($data['email'], 'SAMS Jobs')->subject
              ('Introduction Mail from SAMS Jobs');
           //$message->attach('C:\laravel-master\laravel\public\uploads\image.png');
           $message->embed('http://localhost/laravel/public/images/add200.jpg');
           //$message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('ursams.hr@gmail.com','SAMS Jobs');
        });
      //   echo "Email Sent with attachment. Check your inbox.";
     }
}
