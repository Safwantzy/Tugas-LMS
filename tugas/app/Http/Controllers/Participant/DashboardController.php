<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        // Jumlah kelas yang tersedia / diikuti
        $totalKelas = Kursus::count();


        // Data kursus peserta
        $kelas = Kursus::whereHas('enrollments', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();



        // sementara sebelum ada tabel progres
        $materiSelesai = 0;


        // sementara sebelum ada tabel tugas
        $tugasBelum = 0;


        // sementara sebelum ada tabel nilai
        $nilaiRata = 0;



        // sementara data kosong
        $tugas = collect();

        $pengumuman = collect();



        return view('peserta.Dashboard', compact(
            'totalKelas',
            'materiSelesai',
            'tugasBelum',
            'nilaiRata',
            'kelas',
            'tugas',
            'pengumuman'
        ));
    }
}