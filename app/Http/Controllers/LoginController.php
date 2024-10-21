<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{



    public function showLoginForm()
    {
        $message = " log in.";
        return view('login',compact('message'));
    }
    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors([
            'email' => 'メールアドレスが間違ってます'

        ]);

    }
}

