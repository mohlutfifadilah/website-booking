<?php

namespace App\Http\Controllers;

use App\Models\Kuota;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kuota = Kuota::all();
        return view('admin.kuota.index', compact('kuota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Check if the quota table is empty
        $quotaCount = DB::table('kuota')->count();

        if ($quotaCount === 0) {
            // If the quota table is empty, generate quotas for all days in the current month
            $this->generateQuotasForCurrentMonth();
            return redirect()->route('kuota.index');
        } else {
            // Tentukan bulan saat ini
            $currentDate = now();
            $currentMonth = $currentDate->format('m-Y');

            // Dapatkan data kuota terakhir dari database
            $lastKuota = Kuota::orderBy('tanggal', 'desc')->first();

            // Jika ada data terakhir, tentukan bulan terakhir
            $lastMonth = null;
            if ($lastKuota) {
                $lastMonth = Carbon::parse($lastKuota->tanggal)->format('m-Y');
            }

            // Periksa apakah bulan saat ini berbeda dengan bulan terakhir
            if ($currentMonth !== $lastMonth) {

                $this->removePreviousQuotaData();
                // Bulan saat ini berbeda dengan bulan terakhir di database
                // Lakukan generate data baru untuk bulan ini
                $this->generateQuotasForCurrentMonth();
                return redirect()->route('kuota.index');
            }else{
                return redirect()->route('kuota.index');
            }
        }

    }

    private function generateQuotasForCurrentMonth()
    {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');
        $daysInMonth = Carbon::create($currentYear, $currentMonth)->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            // Buat objek Carbon untuk tanggal
            $date = Carbon::create($currentYear, $currentMonth, $day);

            // Format tanggal ke YYYY-MM-DD
            $tanggalFormatted = $date->format('Y-m-d');

            $quota = 200;

            // Masukkan data ke tabel 'kuota'
            DB::table('kuota')->insert([
                'tanggal' => $tanggalFormatted,
                'kuota_sisa' => 0,
                'kuota_full' => $quota
            ]);
        }
    }

    private function removePreviousQuotaData()
    {
        // Hapus data kuota untuk bulan saat ini dan bulan sebelumnya
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Tentukan bulan sebelumnya
        $previousMonth = Carbon::now()->subMonth()->month;
        $previousYear = Carbon::now()->subMonth()->year;

        // Hapus data kuota dari bulan saat ini
        Kuota::whereMonth('tanggal', $currentMonth)
            ->whereYear('tanggal', $currentYear)
            ->delete();

        // Hapus data kuota dari bulan sebelumnya
        Kuota::whereMonth('tanggal', $previousMonth)
            ->whereYear('tanggal', $previousYear)
            ->delete();
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
}
