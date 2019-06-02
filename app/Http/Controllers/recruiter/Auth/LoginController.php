<?php

namespace App\Http\Controllers\recruiter\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\recruiter\modrecruiter;

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
    protected $redirectTo = 'recruiter/home';
    protected $guard = 'recruiter';

    /*
    protected function redirectTo()
    {
        if (Auth::guard('recruiter')->check()) {
            return redirect('/recruiter/home');
        }
        else {
            return redirect('/home');
        }

    }
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:recruiter')->except('logout');
        //$this->middleware('auth:recruiter')->except('logout');
        //$this->middleware('recruiter')->except('logout');
    }

    public function recruiterLogin(Request $request)
    {
        $message = "Inside recruiterLogin of LoginController";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        $message = "email entered is ". $request->email;
        echo "<script type='text/javascript'>alert('$message');</script>";
        $message = "password entered is ". $request->password;
        echo "<script type='text/javascript'>alert('$message');</script>";

        

        //if((auth()->user()->isrecruiter == 1)->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        if (Auth::guard('recruiter')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
        //if (true)
        {
            //return redirect()->intended(route('recruiter.home'));
            //return redirect('recruiter/home');
            //return view('recruiter.home');
            $message = "In LoginController inside recruiter guard if cond";
            echo "<script type='text/javascript'>alert('$message');</script>";
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
        //This is not happening change this.
        $message = "In LoginController authenticated function";
        echo "<script type='text/javascript'>alert('$message');</script>";
        //$user = App\recruiter\modrecruiter::update(
        $user->update(
            //[
            // 'id'   => Auth::user()->id
            //],
            [ 
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->ip()
            ]
         );
    }

    public function logout()
    {
        Auth::guard('recruiter')->logout();
        return redirect('/recruiter');
    }

    protected function guard()
    {
        return Auth::guard('recruiter');
    }
    
}
