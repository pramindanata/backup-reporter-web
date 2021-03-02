<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $remember = $request->remember === 'on';
        $authAttemptIsSuccess = Auth::attempt([
            'username' => $username,
            'password' => $password,
        ], $remember);

        if ($authAttemptIsSuccess) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }
}
