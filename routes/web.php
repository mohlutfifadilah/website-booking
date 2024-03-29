<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    return view('main', [ 'segment' => $segment ] );
});

Route::get('/berita', function() {
    // $berita = Berita::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('berita', compact('berita'));
    return view('berita', [ 'segment' => $segment ]);
});

Route::get('/panduan', function() {
    // $panduan = Panduan::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('panduan', compact('panduan'));
    return view('panduan', [ 'segment' => $segment ]);
});

Route::get('/kuota', function() {
    // $kuota = Kuota::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('kuota', compact('kuota'));
    return view('kuota', [ 'segment' => $segment ]);
});

Route::get('/sop', function() {
    // $sop = SOP::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('sop', compact('sop'));
    return view('sop', [ 'segment' => $segment ]);
});

Route::get('/register', function() {
    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    return view('daftar', ['segment' => $segment]);
});
