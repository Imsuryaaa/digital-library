<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Username must be filled in',
            'password.required' => 'Password must be filled in'
        ]);

        $infoLogin = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->level == 'admin') {
                return redirect('/admin')->with('Benar', 'Welcome ' . Auth::user()->name . ' Have a nice day');
            } elseif (Auth::user()->level == 'borrowers') {
                return redirect('/index')->with('Benar', 'Welcome ' . Auth::user()->name . ' Have a nice day');
            } elseif (Auth::user()->level == 'officer') {
                return redirect('/petugas')->with('Benar', 'Welcome ' . Auth::user()->name . ' Have a nice day');
            }
        } else {
            return redirect('/login')->with('Salah', 'The username or password you entered is incorrect')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('Benar', 'Log out successfully, see you again');
    }
}
