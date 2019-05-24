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
    protected $redirectTo = 'home';

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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:recruiter')->except('logout');
    }

    public function recruiterLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('recruiter')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended(url('/recruiter'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    function authenticated(Request $request, $user)
    {
        //This is not happening change this.
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->ip()
        ]);
    }

    public function logout()
    {
        Auth::guard('recruiter')->logout();
        return redirect('/recruiter');
    }
}
