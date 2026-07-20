<?php

namespace App\Http\Controllers;

use App\Models\Kursus;

class EnrollmentController extends Controller
{
    public function index()
    {
        $kursus = Kursus::with('peserta')->get();

        return view('enrollment.index', compact('kursus'));
    }
}