<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\DetailDokumentasi; 
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlah_user = User::count();
        $jumlah_kegiatan = Kegiatan::count();
        
        // Mengambil detail dokumentasi terbaru (maksimal 5) berdasarkan tanggal kegiatan
        $detaildokumentasi = DetailDokumentasi::orderByDesc('tanggalkegiatan')
            ->limit(5)
            ->get();
        
        // Menghitung total aktivitas dalam seminggu
        $today = Carbon::today();
        $startOfLastYear = Carbon::today()->subYear()->startOfYear();
        $total_minggu = DetailDokumentasi::whereBetween('tanggalkegiatan', [$startOfLastYear, $today])
            ->count();

        return view('home.dashboard', compact('jumlah_user', 'jumlah_kegiatan', 'detaildokumentasi', 'total_minggu'));
    }
}
