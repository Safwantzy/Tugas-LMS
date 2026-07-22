<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalKursus' => Kursus::count(),
            'totalCategory' => Category::count(),
            'totalEnrollment' => Enrollment::count(),
            'totalUser' => User::count(),
        ]);
    }
}