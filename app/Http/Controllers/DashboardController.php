<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kewarganegaraan;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        if(!Auth::check())
            return redirect('/');

        $count_user = User::whereNotNull('kode_pendaki')->get()->count();
        $count_berita = Berita::get()->count();
        $count_pendaftaran = Pendaftar::where('status', 0)->get()->count();
        $count_riwayat = Pendaftar::where('status', 1)->distinct('created_at')->limit(1)->count();

        $countWNI = User::whereNotNull('kode_pendaki')->where('id_kewarganegaraan', 1)->get()->count();
        $countWNA = User::where('id_kewarganegaraan', 2)->get()->count();

        $dataFromController = [
            'labels' => ["WNI", "WNA"],
            'data' => [$countWNI, $countWNA] // contoh data baru
        ];

        // Panggil fungsi untuk mengambil dan memproses data pendaki
        $climberData = $this->getClimberData();
        // dd($climberData);
        $processedClimberData = $this->processClimberData($climberData);

        return view('admin.dashboard', compact('count_user', 'count_berita', 'count_pendaftaran', 'count_riwayat', 'dataFromController', 'processedClimberData'));
    }

    // Fungsi untuk mengambil data pendaki (sesuaikan dengan logika Anda)
    private function getClimberData()
    {
        // Implementasi untuk mengambil data pendaki dari database, spreadsheet, atau API
        // ...

        $climberData = Pendaftar::where('status', 1)
            ->whereYear('tanggal_naik', 2024)
            ->selectRaw('MONTH(tanggal_naik) AS month, YEAR(tanggal_naik) AS year, COUNT(*) AS total_pendaki')
            ->groupBy('month', 'year')
            ->orderBy('month', 'asc')
            ->orderBy('year', 'asc')
            ->get();

        return $climberData;
    }

    // Fungsi untuk memproses data pendaki (sesuaikan dengan struktur data Anda)
    private function processClimberData($climberData)
    {
        $climberCountPerMonth = [];
        for ($month = 1; $month <= 12; $month++) {
            $climberCountPerMonth[$month] = 0;
        }

        foreach ($climberData as $climber) {
            if ($climber['year'] === 2024) {
                $climberCountPerMonth[$climber['month']]++;
            }
        }

        $monthLabels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $climberCountData = [];
        for ($month = 1; $month <= 12; $month++) {
            $climberCountData[] = $climberCountPerMonth[$month] || 0;
        }

        return [
            'labels' => $monthLabels,
            'data' => $climberCountData,
        ];
    }
}
