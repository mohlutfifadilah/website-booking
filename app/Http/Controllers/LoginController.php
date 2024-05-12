<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //

    public function login(Request $request){

        // dd($request);
        if(Auth::check()){
            return redirect()->route('app')->with('error', 'Anda sudah login!');
        }
        $credentials = $request->only('username', 'password');

        $user = User::all();
        if (Auth::attempt($credentials)) {
            if(Auth::user()->kode_pendaki === null){
                return redirect('dashboard');
            } else {
                if(Auth::user()->is_verified != 1){
                    return redirect()->route('app')->with('error', 'Akun belum terverifikasi oleh admin');
                } else {
                    return redirect()->route('app')->with('sukses', 'Berhasil login!');
                }
            }
        }

        return Redirect('/')->with('credentials', 'Username atau Password salah!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
