<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'Aziz' && $password === 'Aziz1234') {
            Session::put('username', $username);
            return redirect()->route('student.index');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        Session::forget('username');
        return redirect()->route('login');
    }
}
