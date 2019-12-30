<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'logo' => 'file|dimensions:max_width=400,max_height=400|max:1000',
            'city' => ['required', 'string', 'max:64'],
            'phone' => ['required', 'size:12','unique:users','regex:/(380)[0-9]{9}/'],
            'phone_auth' => ['size:1'],
            'birthday' => ['date'],
            'email' => ['required', 'string', 'email', 'max:128', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',],
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
        $path = $data['logo']->store('public/avatars');

        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'last_name' => $data['last_name'],
            'logo' => $path,
            'country' => $data['country'],
            'region' => $data['region'],
            'city' => $data['city'],
            'addr' => $data['addr'],
            'phone' => $data['phone'],
            'phone_auth' => $data['phone_auth'],
            'birthday' => $data['birthday'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }



}
