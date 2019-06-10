<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    protected function redirectTo()
    {
        if (Auth::check())
        {
            //$authid = Auth::id();
            $user = Auth::user();
            $authtype=$user->user_type;
            if($authtype == 1){
                return route('home');
            }
            else if($authtype==2){
                return route('rechome');
            }
            //Mike 21 May end
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mob_num' => ['required', 'digits:10', 'regex:/^([6-9]{1})([0-9]{9})$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['digits:1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        echo "User type value is " .$data['user_type'];
        if(($data['user_type']) == "Candidate"){
            $data['user_type']=1;
            $data['is_admin']=false;
        }
        return User::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mob_num' => $data['mob_num'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
