<?php

namespace Incidencias\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Incidencias\User;
use Validator;
use Incidencias\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'User' => 'required|max:10',
            'Dni' => 'required|max:9|unique:users',
            'Nombre' => 'required|max:50',
            'Password' => 'required|min:6|confirmed',
            'Tipo' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'user' => $data['User'],
            'Nombre' => $data['Nombre'],
            'Dni' => $data['Dni'],
            'password' => bcrypt($data['Password']),
            'Tipo' => $data['Tipo'],
        ]);
        
    }
    protected function guard()
    {
        return Auth::guard('web');
    }
    /*public function showRegistrationForm(){

        return redirect('login');
    }*/
}
