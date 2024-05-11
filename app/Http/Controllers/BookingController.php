<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use App\Models\Pendaftar;
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
        // check kuota
        $kuota = Kuota::find($id);
        if ($kuota->kuota_sisa === $kuota->kuota_full){
            return redirect()->route('bookingg', $id)->with('error', 'Kuota penuh');
        }

        if (is_null($request->tanggal_naik)) {
            return redirect()->route('bookingg', $id)->with('tanggal_naik', 'Tanggal Naik harus diisi');
        }
        if (is_null($request->tanggal_turun)) {
            return redirect()->route('bookingg', $id)->with('tanggal_turun', 'Tanggal Turun harus diisi');
        }
        if (is_null($request->total_pendaki)) {
            return redirect()->route('bookingg', $id)->with('total_pendaki', 'Total Pendaki harus diisi');
        }

        $user = User::find(Auth::user()->id);

        Pendaftar::create([
            'kode_pendaki' => $user->kode_pendaki,
            'nama' => $user->nama_lengkap,
            'usia' => $user->usia,
            'no_telepon' => $user->no_telepon,
            'no_telepon_darurat' => $user->no_telepon,
            'alamat' => $user->alamat,
            'tanggal_naik' => $request->tanggal_naik,
            'tanggal_turun' => $request->tanggal_turun,
        ]);

        // Tangkap jumlah pendaki dari formulir
        $jumlahPendaki = $request->total_pendaki;

        // Loop untuk menangkap data setiap pendaki
        for ($i = 1; $i <= $jumlahPendaki; $i++) {
            $namaPendaki = $request->input('nama_pendaki_' . $i);
            $usiaPendaki = $request->input('usia_pendaki_' . $i);
            $noTeleponPendaki = $request->input('no_telepon_pendaki_' . $i);
            $noTeleponDaruratPendaki = $request->input('no_telepon_darurat_pendaki_' . $i);
            $alamatPendaki = $request->input('alamat_pendaki_' . $i);
            // Lakukan operasi dengan data pendaki
            // Misalnya, simpan ke database atau proses lainnya

            Pendaftar::create([
                'kode_pendaki' => $user->kode_pendaki,
                'nama' => $namaPendaki,
                'usia' => $usiaPendaki,
                'no_telepon' => $noTeleponPendaki,
                'no_telepon_darurat' => $noTeleponDaruratPendaki,
                'alamat' => $alamatPendaki,
                'tanggal_naik' => $request->tanggal_naik,
                'tanggal_turun' => $request->tanggal_turun,
            ]);
        }

        $kuota->update([
            'kuota_sisa' => $kuota->kuota_sisa+$jumlahPendaki,
        ]);

        return redirect()->route('app')->with('sukses', 'Registrasi Pendakian Berhasil!');
    }
}
