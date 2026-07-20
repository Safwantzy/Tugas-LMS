<?php

namespace App\Http\Controllers;

use App\Models\Kursus;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKursus = Kursus::count();

        $totalKategori = Kursus::distinct('kategori')
            ->count('kategori');

        return view('dashboard', compact(
            'totalKursus',
            'totalKategori'
        ));
    }
}