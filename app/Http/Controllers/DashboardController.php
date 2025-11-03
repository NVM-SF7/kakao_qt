<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\BlokJalur;
use App\Models\Tanaman;
use App\Models\Taksasi;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik global
        $totalKebun = Kebun::count();
        $totalBlokJalur = BlokJalur::count();
        $totalTanaman = Tanaman::count();

        $totalPentil = Taksasi::sum('pentil');
        $totalBuahMuda = Taksasi::sum('buah_muda');
        $totalBuahMengkal = Taksasi::sum('buah_mengkal');
        $totalBuahMasak = Taksasi::sum('buah_masak');
        // Ambil semua kebun + jumlah blok + jumlah tanaman per kebun
        $kebuns = Kebun::withCount(['blokJalur', 'tanaman'])->get();

        return view('dashboard', compact(
            'totalKebun',
            'totalBlokJalur',
            'totalTanaman',
            'kebuns',
            'totalPentil',
            'totalBuahMuda',
            'totalBuahMengkal',
            'totalBuahMasak',
        ));
    }
}

