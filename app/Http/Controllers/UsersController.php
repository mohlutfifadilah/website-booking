<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Kewarganegaraan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::whereNotNull('kode_pendaki')->where('status', '=', null)->get();
        return view('admin.pengguna.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('admin.pengguna.info', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyUser($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);

        // Ubah status verifikasi pengguna
        $user->is_verified = true;
        $user->save();

        // Alihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('users.index');
    }

    public function blacklistUser($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);

        // Setel lokalisasi ke Bahasa Indonesia
        Carbon::setLocale('id');

        // Ambil tanggal saat ini
        $today = Carbon::now();

        // Tambahkan satu tahun ke tanggal saat ini
        $futureYear = $today->copy()->addYear();

        // Hitung selisih dalam hari antara tanggal saat ini dan tanggal satu tahun ke depan
        $daysRemaining = $today->diffInDays($futureYear);

        // Format tanggal ke dalam format yang diinginkan
        $todayFormatted = $today->isoFormat('D MMMM YYYY');
        $futureYearFormatted = $futureYear->isoFormat('D MMMM YYYY');

        // Ubah status verifikasi pengguna
        $user->deskripsi = 'Melanggar peraturan dan ketentuan yang berlaku';
        $user->lama = $daysRemaining;
        $user->jangka = $todayFormatted . ' - ' . $futureYearFormatted;
        $user->status = 0;
        $user->save();

        // Alihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('blacklist.index');
    }
}
