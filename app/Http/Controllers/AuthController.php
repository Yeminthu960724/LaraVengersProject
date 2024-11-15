<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Hash;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user =DB::table('users')->where('email',$request->email)->first();

        if($user && Hash::check($request->password,$user->password)) {
            return redirect()->route('place');
        }


        return back()->witherrors([
            'login' => '��񂪐���������܂���'

        ]);
    }

    public function place()
    {
        return view('place');
    }
}
