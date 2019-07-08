<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use DateTime;
use DateInterval; 

class payController extends Controller
{
    //Buy Credits by Authorized Candidate.
    public static function buycredits(Request $request){
        if (Auth::check()){
            //dd('Inside buycredits of paycontroller');
            //Testing
            //$message = "Inside buycredits of payController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            return view('users.buycredits_prof');
            //return redirect()->route('buyview');
        }
        else {
            return back();
        }
    }

    //Payment gateway to buy credits by Authorized Candidates.
    public function payment(Request $request){
        if (Auth::check()){
            //Testing
            //$message = "Inside buycredits of payController";
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $trans_amnt=0;
            $prod_id=0;
            $packname=$request->input('packname');
            //dd($packname);
            switch($packname){
                case "basic":
                    $trans_amnt=200;
                    $prod_id=3;
                    break;
                case "economy":
                    $trans_amnt=500;
                    $prod_id=4;
                    break;
                case "silver":
                    $trans_amnt=1000;
                    $prod_id=5;
                    break;
                case "gold":
                    $trans_amnt=1500;
                    $prod_id=6;
                    break;
                case "platinum":
                    $trans_amnt=2000;
                    $prod_id=7;
                    break;
            }
            // $message = "Inside buycredits of payController trans_amnt is " . $packname;
            // echo "<script type='text/javascript'>alert('$message');</script>";
            
            $intrans_id=PostsController::get_maxintransid();
            if(isset($intrans_id)){
                $intrans_id=$intrans_id + 1;
            }
            //$intrans_id=1000;
            $extrans_id=substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            $txnid=$extrans_id;
            $trans_type=2;          //Sell transaction type
            $amount=$trans_amnt;
            $prod_info=$packname;
            $trans_with=1;          //PayUmoney
            $trans_validto=null;    //No validity for credits who buy.
            $trans_stat=1;          //Initiated
            $trans_msg="Init";      //Initiated
            $firstname=Auth::user()->name;
            $email=Auth::user()->email;
            $phone=Auth::user()->mob_num;
            // $surl = 'http://localhost/laravel/public/payment_success';
            // $furl = 'http://localhost/laravel/public/payment_failure';
            // $curl = 'http://localhost/laravel/public/payment_cancel';
            $surl = 'https://www.samsjobs.in/payment_success';
            $furl = 'https://www.samsjobs.in/payment_failure';
            $curl = 'https://www.samsjobs.in/payment_cancel';
            $service_provider = 'payu_paisa';
            $merchant_key = "R886JwQS";
            
            //Update Transaction Table before going to payment gateway
            $dbtransact=PostsController::upd_itransact($intrans_id, $extrans_id, $trans_type, $trans_amnt, $prod_id, $prod_info, $trans_with, $trans_validto, $trans_stat, $trans_msg);
            
            if($dbtransact==true){
                $posted = array(
                    'key' => $merchant_key,
                    'txnid' => $extrans_id,
                    'amount' => $trans_amnt,
                    'firstname' => $firstname,
                    'email' => $email,
                    'phone' => $phone,
                    'productinfo' => $packname,
                    'surl' => $surl,
                    'furl' => $furl,
                    'curl' => $curl,
                    'service_provider' => $service_provider,
                    'udf1'  => $intrans_id
                );
                return view('users.process_payment',compact('posted'));
            }
        }
        else {
            return back();
        }
    }

    //If response from PayU Payment gateway is success.
    public function spayment(){
        if(!empty($_POST)) {
            $_POST_BKUP=$_POST;
            $trans_stat=2;          //success
            $trans_msg=$_POST["status"];
            // $firstname=$_POST["firstname"];
            // $amount=$_POST["amount"];
            // $txnid=$_POST["txnid"];
            // $posted_hash=$_POST["hash"];
            // $key=$_POST["key"];
            $packname=$_POST["productinfo"];
            // $email=$_POST["email"];
            $intrans_id=$_POST["udf1"];
            $salt="VBQQ0cwAj1";
            // Salt should be same Post Request 

            //Update Transaction record
            $dbtranstat=PostsController::upd_stransact($intrans_id, $trans_stat, $trans_msg);

            if($dbtranstat == true){
                //Create credits record
                $user_id=$rec_id=null;

                if(Auth::check()){
                    $user_id=Auth::id();    
                }
                else{
                    $rec_id=Auth::guard('recruiter')->user()->id;
                }
                //get max credit id.
                $credit_id=PostsController::get_maxcreditid();
                if(isset($credit_id)){
                    $credit_id=$credit_id + 1;
                }

                switch($packname){
                    case "basic":
                        $credits=8;
                        break;
                    case "economy":
                        $credits=24;
                        break;
                    case "silver":
                        $credits=48;
                        break;
                    case "gold":
                        $credits=72;
                        break;
                    case "platinum":
                        $credits=100;
                        break;
                }

                $credit_type=1;     //cash
                $status=1;          //valid

                $dbcredits=PostsController::upd_credit($user_id, $rec_id, $credit_id, $intrans_id, $credits, $credit_type, $status);

                if($dbcredits==true){
                    $_POST=$_POST_BKUP;
                    return view('users.spayment',compact('$_POST','salt'));
                }
            }
        }
        else{
            return back();
        }
    }   

    //If response from PayU Payment gateway is failed.
    public function fpayment(){
        if(!empty($_POST)) {
            // $status=$_POST["status"];
            // $firstname=$_POST["firstname"];
            // $amount=$_POST["amount"];
            // $txnid=$_POST["txnid"];
            // $posted_hash=$_POST["hash"];
            // $key=$_POST["key"];
            // $productinfo=$_POST["productinfo"];
            // $email=$_POST["email"];
            $salt="VBQQ0cwAj1";
            // Salt should be same Post Request 

            return view('users.fpayment',compact('$_POST','salt'));
        }
        else{
            return back();
        }
    }   

    //If response from PayU Payment gateway is cancelled.
    public function cpayment(){
        if(!empty($_POST)) {
            // $status=$_POST["status"];
            // $firstname=$_POST["firstname"];
            // $amount=$_POST["amount"];
            // $txnid=$_POST["txnid"];
            // $posted_hash=$_POST["hash"];
            // $key=$_POST["key"];
            // $productinfo=$_POST["productinfo"];
            // $email=$_POST["email"];
            $salt="VBQQ0cwAj1";
            // Salt should be same Post Request 

            return view('users.fpayment',compact('$_POST','salt'));
        }
        else{
            return back();
        }
    }   
}
