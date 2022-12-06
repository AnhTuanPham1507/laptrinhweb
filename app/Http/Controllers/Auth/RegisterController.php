<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\ConfirmRegister;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
    }

    private function randomStr($length)
    {
        $randomStr = 'fsalkjfhj1324jL@IHLJLKNC<MNAOiahlkdfnalLKSANLFKNFSM,DAFN@bjdASMDNASMN12321#!^*#^!*^$*)%*)%^*.><???<DWDdsakfkashgjsakgjdaskjhgdj';
        return substr(
            str_shuffle($randomStr),
            0,
            $length
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function sendMailToConfirmRegister($token, $user_id)
    {
        $data = array('name' => "Phạm Anh Tuấn", "token" => $token, "user_id" => $user_id);
        Mail::send('mail2', $data, function ($message) {
            $message->to('1851050171tuan@ou.edu.vn', 'Phạm Anh Tuấn')->subject('Confirm Register User');
            $message->from('phamanhtuan9a531@gmail.com', 'Thông báo');
        });
    }

    protected function create(array $data)
    {
        $createdUser =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => UserRole::getValue('MANAGER'),
            'status' => UserStatus::getValue('INACTIVE')
        ]);

        $createdConfirmRegister = ConfirmRegister::create([
            'token' => $this->randomStr(20),
            'user_id' => $createdUser->id
        ]);

        //send mail
        $this->sendMailToConfirmRegister($createdConfirmRegister->token, $createdConfirmRegister->user_id);
        return $createdUser;
    }
}
