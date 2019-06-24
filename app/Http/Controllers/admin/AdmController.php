<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Carbon;
use DateTime;
use DateInterval;
use App\User;

class AdmController extends Controller
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

    //Get details of registered users
    public static function ctoday(){
        if(Auth::guard('admin')->check()){
            $authid = Auth::guard('admin')->user()->id;
            $current_date_time = Carbon::now()->toDateTimeString();
            //get all registered users today
            $userrec = \App\User::select('id', 'user_type', 'name',  'email', 'email_verified_at', 'mob_num', 'mob_verified_at', 'admin_id', 'is_admin','created_at', 'updated_at')
            //$userrec = $userrec->where('updated_at', '=', Carbon::today())
                    ->orderBy('id','asc')
                    ->paginate(10);

            return view('admin.ctoday',compact('userrec'));
        }
    }

    //Verify User Mobile Number Manually
    public static function mob_verified($userid){
        if(Auth::guard('admin')->check()){
            $authid = Auth::guard('admin')->user()->id;
            $current_date_time = Carbon::now()->toDateTimeString();
            //Update mobile verified at with current timestamp;
            $app_status = \DB::table('users')
                            ->where('id', '=', $userid)
                            ->limit(1)
                            ->update(['mob_verified_at'=>$current_date_time]);
            return back();
        }
    }

    //Get full details of registered user
    public static function viewuser($user){
        if(Auth::guard('admin')->check()){
            $authid = Auth::guard('admin')->user()->id;
            $current_date_time = Carbon::now()->toDateTimeString();
            //get all registered users today
            $userrec = \App\User::select('id', 'user_type', 'name',  'email', 'email_verified_at', 'mob_num', 'mob_verified_at', 'admin_id', 'is_admin','created_at', 'updated_at')
            //$userrec = $userrec->where('updated_at', '=', Carbon::today())
                    ->orderBy('id','asc')
                    ->paginate(10);

            return view('admin.ctoday',compact('userrec'));
        }
    }

}
