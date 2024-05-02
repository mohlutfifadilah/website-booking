<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //

    public function login(Request $request){

        // dd($request);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }

        return Redirect('/')->with('error', 'Username atau Password salah!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
