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
        $user = User::find(Auth::user()->id);
        $pendaftar = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 0)->get();
        $riwayat = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 1)->get();
        $count_pendaftar = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 0)->count();
        $count_riwayat = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 1)->count();
        $pendaftar_first = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 0)->first();
        $riwayat_first = Pendaftar::where('kode_pendaki', '=', $user->kode_pendaki)->where('status', '=', 1)->first();

        $harga = 35000;

        $segment = request()->segment(1);
        if ($segment===null){
            $segment = 'booking';
        }
        return view('booking', compact('user', 'pendaftar', 'riwayat', 'count_pendaftar', 'count_riwayat', 'pendaftar_first', 'riwayat_first', 'harga', 'segment'));
    }

    public function booking($id){
        if(!Auth::check()){
            return redirect('/')->with('error','Kamu harus login dulu');
        }
        $pendaftar = Pendaftar::where('kode_pendaki', '=', Auth::user()->kode_pendaki)->where('status', '=', 0)->first();
        if($pendaftar){
            return redirect('booking')->with('error','Tidak bisa registrasi lebih dari 1');
        }

        $segment = request()->segment(1);
        if ($segment===null){
            $segment = 'cek_kuota';
        }
        $user = User::find(Auth::user()->id);
        $kuota = Kuota::find($id);
        return view('registrasi', compact('segment','user', 'kuota'));
    }

    public function registrasi(Request $request, $id){
        // check kuota
        $kuota = Kuota::find($id);
        $sisa_kuota = $kuota->kuota_full-$kuota->kuota_sisa;
        // Tangkap jumlah pendaki dari formulir
        $jumlahPendaki = $request->total_pendaki;
        if ($kuota->kuota_sisa === $kuota->kuota_full){
            return redirect()->route('bookingg', $id)->with('error', 'Kuota penuh');
        }
        if($jumlahPendaki>=$sisa_kuota){
            return redirect()->route('bookingg', $id)->with('error', 'Kuota tidak mencukupi');
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
            'tanggal_naik' => $kuota->tanggal,
            'tanggal_turun' => $request->tanggal_turun,
            'status' => 0
        ]);


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
                'tanggal_naik' => $kuota->tanggal,
                'tanggal_turun' => $request->tanggal_turun,
                'status' => 0
            ]);
        }

        $kuota->update([
            'kuota_sisa' => $kuota->kuota_sisa+$jumlahPendaki+1,
        ]);
        return redirect()->route('app')->with('sukses', 'Registrasi Pendakian Berhasil!');
    }
    public function delete($id){

        // dd($id);
        $pendaftar = Pendaftar::find($id);

        $data = Pendaftar::where('kode_pendaki', '=', $pendaftar->kode_pendaki)->where('status', 0);
        $total_pendaki = $data->count();
        $kuota = Kuota::where('tanggal', $pendaftar->tanggal_naik)->first();
        $kuota->update([
            'kuota_sisa' => $kuota->kuota_sisa-$total_pendaki,
        ]);
        $data->delete();

        return redirect('booking')->with('sukses','Booking berhasil dihapus');
    }
}
