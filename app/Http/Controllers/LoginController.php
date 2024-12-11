<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // データベースからユーザーを直接検索
        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        // ユーザーが存在し、パスワードが一致する場合
        if ($user && Hash::check($request->password, $user->password)) {
            // セッションにユーザー情報を保存
            $request->session()->put('user_id', $user->id);
            $request->session()->put('email', $user->email);

            // ログイン成功時にマイプロフィールページへリダイレクト
            return redirect('/myprofile')->with('success', 'ログインしました。');
        }

        // 認証失敗時の処理
        return back()
            ->withErrors([
                'email' => 'メールアドレスまたはパスワードが正しくありません。',
            ])
            ->withInput($request->only('email'));
    }

    public function showMyProfile()
    {
        // ダミーデータをビューに渡す
        return view('myprofile', [
            'email' => 'example@example.com',  // ダミーのメールアドレス
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = DB::table('users')->where('id', session('user_id'))->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => '現在のパスワードが正しくありません。']);
        }

        DB::table('users')
            ->where('id', session('user_id'))
            ->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'パスワードを更新しました。');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'email']);
        return redirect('/login')->with('success', 'ログアウトしました。');
    }
}
