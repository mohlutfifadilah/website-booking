<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(Request $request){

        if (is_null($request->kewarganegaraan)) {
            return redirect()->route('register')->with('kewarganegaraan', 'Kewarganegaraan harus diisi');
        }

        if (is_null($request->identitas)) {
            return redirect()->route('register')->with('identitas', 'Identitas harus diisi');
        }

       if ($request->file('fotoidentitas')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('fotoidentitas')->getSize();
            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024 || $fileSize === False) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('fotoidentitas', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('fotoidentitas');
            $image = $request->file('fotoidentitas')->store('fotoidentitas');
            $file->move('storage/fotoidentitas/', $image);
            $image = str_replace('fotoidentitas/', '', $image);
        } else {
            return redirect()->route('register')->with('fotoidentitas', 'File Identitas harus diisi');
        }

        if (is_null($request->nama_lengkap)) {
            return redirect()->route('register')->with('nama_lengkap', 'Nama Lengkap harus diisi');
        }

        if (is_null($request->no_identitas)) {
            return redirect()->route('register')->with('no_identitas', 'Nomor Identitas harus diisi');
        }

        if (is_null($request->email)) {
            return redirect()->route('register')->with('email', 'Email harus diisi');
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('register')->with('email', 'Format Email tidak valid');
        }

        if (is_null($request->no_telepon)) {
            return redirect()->route('register')->with('no_telepon', 'Nomor Telepon harus diisi');
        }

        if (!is_numeric($request->no_telepon)) {
            return redirect()->route('register')->with('no_telepon', 'Nomor Telepon harus berupa angka');
        }

        if (is_null($request->alamat)) {
            return redirect()->route('register')->with('alamat', 'Alamat harus diisi');
        }

        if (is_null($request->usia)) {
            return redirect()->route('register')->with('usia', 'Usia harus diisi');
        }

        if (!is_numeric($request->usia)) {
            return redirect()->route('register')->with('usia', 'Usia harus berupa angka');
        }

        if (is_null($request->tinggi_badan)) {
            return redirect()->route('register')->with('tinggi_badan', 'Tinggi Badan harus diisi');
        }

        if (!is_numeric($request->tinggi_badan)) {
            return redirect()->route('register')->with('tinggi_badan', 'Tinggi Badan harus berupa angka');
        }

        if (is_null($request->tinggi_badan)) {
            return redirect()->route('register')->with('tinggi_badan', 'Tinggi Badan harus diisi');
        }

        if (!is_numeric($request->tinggi_badan)) {
            return redirect()->route('register')->with('tinggi_badan', 'Tinggi Badan harus berupa angka');
        }

        if (is_null($request->username)) {
            return redirect()->route('register')->with('username', 'Username harus diisi');
        }

        if (is_null($request->password)) {
            return redirect()->route('register')->with('password', 'Password harus diisi');
        }

        // Karakter yang diizinkan: angka (0-9) dan huruf uppercase (A-Z)
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Acak karakter
        $shuffled = str_shuffle($characters);

        // Potong hasil acakan untuk mendapatkan kode dengan panjang yang diinginkan
        $kode_pendaki = substr($shuffled, 0, 6);

        if($request->kewarganegaraan === 'WNI'){
            $kewarganegaraan = 1;
        } else {
            $kewarganegaraan = 2;
        }

        if($request->identitas === 'KTP'){
            $identitas = 1;
        } else if($request->identitas === 'SIM') {
            $identitas = 2;
        } else if($request->identitas === 'Kartu Pelajar'){
            $identitas = 3;
        } else if($request->identitas === 'Passport'){
            $identitas = 4;
        } else if($request->identitas === 'Kitas'){
            $identitas = 5;
        }

        User::create([
            'kode_pendaki' => $kode_pendaki,
            'id_kewarganegaraan' => $kewarganegaraan,
            'id_identitas' => $identitas,
            'foto_identitas' => $image,
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_identitas' => $request->no_identitas,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'usia' => $request->usia,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'alamat' => $request->alamat,
            'is_verified' => 0,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('app')->with('sukses', 'Berhasil membuat akun, harap tunggu verifikasi dari admin');
    }
}
