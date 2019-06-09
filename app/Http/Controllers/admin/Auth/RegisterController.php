<?php

namespace App\Http\Controllers\admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\admin\modadmins;
use App\recruiter\modrecruiter;
use App\User;

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
    protected $redirectTo = '/admin/home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'mob_num' => ['required', 'digits:10', 'regex:/^([6-9]{1})([0-9]{9})$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string', 'regex:(Admin)'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return App\admin\modadmins
     */
    protected function create(array $data)
    {
        //echo "User type value is " .$data['user_type'];
        if(($data['user_type']) == "Admin"){
            $data['user_type']=3;
            $data['is_sadmin']=false;
            $data['is_admin']=true;
        }
        /*
        return \App\admin\modadmins::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mob_num' => $data['mob_num'],
            'password' => Hash::make($data['password']),
            'is_sadmin' => $data['is_sadmin'],
        ]);
        */
        //dd("mike");
        $password=Hash::make($data['password']);
        $admin=\App\admin\modadmins::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mob_num' => $data['mob_num'],
            'password' => $password,
            'is_sadmin' => $data['is_sadmin'],
        ]);
        
        //Insert record into user table also
        $recruiter=\App\recruiter\modrecruiter::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mob_num' => $data['mob_num'],
            'password' => $password,
            'is_admin' => $data['is_admin'],
            'admin_id' => $admin->id,
        ]);
        
        //Insert record into users table also
        $user=\App\User::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'mob_num' => $data['mob_num'],
            'password' => $password,
            'is_admin' => $data['is_admin'],
            'admin_id' => $admin->id,
        ]);
        
        return $admin;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('admin');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}