<?php

namespace App\Http\Controllers\admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\admin\modadmins;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //mike start
    public function adminLogin(Request $request)
    {
        //$message = "Inside adminLogin of LoginController";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);


        //if((auth()->user()->isrecruiter == 1)->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
        //if (true)
        {
            return $this->sendLoginResponse($request);
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function authenticated(Request $request, $user)
    {
        $user->update(
            //[
            // 'id'   => Auth::guard('admin')->user()->id
            //],
            [ 
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->ip()
            ]
         );
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/mikeadmin');
    }

    
    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}