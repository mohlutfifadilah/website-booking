<?php

use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\KewarganegaraanController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\UsersController;

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

Route::get('/beritaa', function() {
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

Route::get('/cek_kuota', function() {
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

# Login

Route::post('/login', [LoginController::class, 'login'])->name('login');

# Admin
Route::get('/dashboard',  [DashboardController::class, 'index']);
Route::resource('users', UsersController::class);
Route::resource('kewarganegaraan', KewarganegaraanController::class);
Route::resource('identitas', IdentitasController::class);
Route::resource('berita', BeritaController::class);
Route::resource('kuota', KuotaController::class);
Route::resource('pendaftar', PendaftarController::class);
