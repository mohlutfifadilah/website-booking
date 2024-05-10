<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function index() {
        $user = User::all();
        return view('booking', compact('user'));
    }

    public function booking($id){
        if(!Auth::check()){
            return redirect('/')->with('error','Kamu harus login dulu');
        }
        $segment = request()->segment(1);
        if ($segment===null){
            $segment = 'beranda';
        }
        $user = User::find(Auth::user()->id);
        $kuota = Kuota::find($id);
        return view('registrasi', compact('segment','user', 'kuota'));
    }

    public function registrasi(Request $request, $id){
        dd($request);
    }
}
