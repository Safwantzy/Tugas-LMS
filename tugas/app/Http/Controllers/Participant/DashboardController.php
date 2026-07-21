<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil kursus peserta
        $kelas = $user->kursus;


        // Hitung jumlah kursus
        $totalKelas = $kelas->count();


        // Statistik
        $materiSelesai = 0;
        $tugasBelum = 0;
        $nilaiRata = 0;


        // Data tugas
        $tugas = collect();


        // Data pengumuman
        $pengumuman = collect();



        return view('peserta.dashboard', [
            'kelas' => $kelas,
            'totalKelas' => $totalKelas,
            'materiSelesai' => $materiSelesai,
            'tugasBelum' => $tugasBelum,
            'nilaiRata' => $nilaiRata,
            'tugas' => $tugas,
            'pengumuman' => $pengumuman,
        ]);
    }
}