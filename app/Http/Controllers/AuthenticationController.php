<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, $request->remember_me)) {
            return redirect('/');
        }
        return back()->withErrors(['Your Credentials Is Invalid']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
