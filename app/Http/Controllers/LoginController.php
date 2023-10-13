<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('username');
    }

    public function submitRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
            'role'     => 'nullable'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password =  Hash::make($request->password);
        $user->role     = 'account_manager';

        if($user->save()) {
            Auth::loginUsingId($user->id);
            return redirect('/');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
