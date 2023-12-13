<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;

class UserController extends Controller
{   
    const JOB_SEEKER = "seeker";
    const JOB_POSTER = "employer";
    public function createSeeker()
    {
        return view('user.seeker-register');
    }

    public function createEmployer()
    {
        return view('user.employer-register');
    }

    public function storeSeeker()
    {   
        request()->validate([
            'name'=> ['required','string','max:250'],
            'email' => ['required','string','email', 'max:250', 'unique:users'],
            'password'=> ['required']
        ]);
        $user = User::create([
            'name' => request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);

        $user->sendEmailVerificationNotification();
        return redirect()->route('login');
    }

    public function storeEmployer()
    {   
        request()->validate([
            'name'=> ['required','string','max:250'],
            'email' => ['required','string','email', 'max:250', 'unique:users'],
            'password'=> ['required']
        ]);
        $user = User::create([
            'name' => request('name'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
            'user_type' => self::JOB_POSTER
        ]);

        $user->sendEmailVerificationNotification();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('user.login');

    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email','password');

        if (auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }
        else
        {
            return redirect()->intended(route('password.request'));
        }
        // return 'Wrong email or password';
    }

    
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    // ahnaf
    
    public function postForgot(Request $request)
    {
        $user = User::where('email','=', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(60);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            echo "Email sent successfully";
            return redirect()->back()->with('success', 'Email sent successfully');
        }
        echo "Email does not exist";
        return redirect()->back()->with('error', 'Email does not exist');

    }

    public function reset($token)
    {
        $user = User::where('remember_token','=', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            return view('user.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function postReset($token, Request $request)
    {
        $user = User::where('remember_token','=', $token)->first();
        if(!empty($user)){
            $user->password = Hash::make($request->password);
            if(empty($user->email_verified_at)){
                $user->email_verified_at = date('Y-m-d H:i:s');
            }
            $user->remember_token = Str::random(60);
            $user->save();
            return redirect()->route('login');

        }
        else
        {
            abort(404);
        }
    }

    public function seekerProfile()
    {
        return view('seeker.profile');
    }

    

    

}


