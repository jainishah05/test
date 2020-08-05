<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $mailctrl;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->mailctrl = new MailController();
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $registeredUser = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //send successful registration mail to user
        $email = emailTemplate('register_email');
        $email->message =   str_replace("{Email}",$data['email'],$email->message);
        $email->message =   str_replace("{Password}",$data['password'],$email->message);
       
        $emailData = [
            'email' => $data['email'],
            'subject' => $email->subject,
            'mess' => $email->message
        ];
        $this->mailctrl->success_email($emailData);

        //send successful registration mail to admin
        $email = emailTemplate('register_email_admin');
        $email->message = str_replace("{Email}",$data['email'],$email->message);

        $emailData = [
            'email' => get_config('admin_email'),
            'subject' => $email->subject,
            'mess' => $email->message
        ];
        $this->mailctrl->success_email($emailData);

        return $registeredUser;  
    }
}
