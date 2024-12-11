<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function __construct()
    {
        // showLoginFormとloginアクション以外はセッションチェックを行う
        $this->middleware(function ($request, $next) {
            if (!session('email') && !in_array($request->route()->getName(), ['login', 'showLoginForm'])) {
                return redirect('/login')->with('error', 'ログインしてください');
            }
            return $next($request);
        })->except(['showLoginForm', 'login']);
    }

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

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // セッションにユーザー情報を保存
            session([
                'email' => $user->email,
                'username' => $user->name
            ]);

            return redirect()->route('showMyProfile');
        }

        return back()->withErrors([
            'login' => 'メールアドレスまたはパスワードが正しくありません'
        ]);
    }

    public function place()
    {
        return view('place');
    }

    public function showMyProfile()
    {
        $email = session('email');
        $username = session('username');

        return view('myprofile', [
            'email' => $email,
            'username' => $username
        ]);
    }

    public function logout(Request $request)
    {
        // セッションをクリア
        $request->session()->flush();

        return redirect('/login')->with('success', 'ログアウトしました');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = DB::table('users')->where('email', session('email'))->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません']);
        }

        DB::table('users')
            ->where('email', session('email'))
            ->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'パスワードを更新しました');
    }
}
