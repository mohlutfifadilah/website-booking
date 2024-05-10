<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\KewarganegaraanController;
use App\Http\Controllers\KuotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;
use App\Models\Berita;
use App\Models\Identitas;
use App\Models\Kewarganegaraan;
use App\Models\Kuota;

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
    $berita = Berita::limit(3)->get();
    if ($segment===null){
        $segment = 'beranda';
    }
    return view('main', [ 'segment' => $segment, 'berita' => $berita ] );
})->name('app');

Route::get('/beritaa', function() {
    $berita = Berita::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('berita', compact('berita'));
    return view('berita', [ 'segment' => $segment, 'berita' => $berita ]);
});

Route::get('/berita_info/{id}', function($id){
    $berita = Berita::find($id);

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }

    return view('berita_info', compact('berita', 'segment'));
})->name('berita_info');

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
    $kuota = Kuota::all();

    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }
    // return view('kuota', compact('kuota'));
    return view('kuota', [ 'segment' => $segment, 'kuota' => $kuota ]);
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
    $kw = Kewarganegaraan::all();
    $identitas = Identitas::all();
    return view('daftar', ['segment' => $segment,
                           'kw' => $kw,
                           'identitas' => $identitas]);
})->name('register');

// Tambahkan route untuk URI yang diinginkan
Route::get('/is_verified/{id}', [UsersController::class, 'verifyUser'])->name('is_verified');

# Login

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

# Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/booking/{id}', [BookingController::class, 'booking'])->name('bookingg');
Route::post('/registrasi/{id}', [BookingController::class, 'registrasi'])->name('registrasi');

# Admin
Route::get('/dashboard',  [DashboardController::class, 'index']);
Route::resource('users', UsersController::class);
Route::resource('kewarganegaraan', KewarganegaraanController::class);
Route::resource('identitas', IdentitasController::class);
Route::resource('berita', BeritaController::class);
Route::resource('kuota', KuotaController::class);
Route::resource('pendaftar', PendaftarController::class);
