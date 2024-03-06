<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function register(){

    }

    public function login (Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role === 1){
                return redirect('dashboard')->withSuccess('Selamat datang, Admin');
            }else {
                return redirect('/')->withSuccess('Berhasil Login');
            }
        }

        return redirect("login")->with('error', 'Email atau Password salah!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
