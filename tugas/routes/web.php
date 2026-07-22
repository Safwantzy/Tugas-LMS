<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (auth()->check()) {

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->role === 'peserta') {
            return redirect()->route('peserta.dashboard');
        }

    }

    return view('welcome');

});



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->group(function () {


        /*
        | Dashboard Admin
        */

        Route::get('/dashboard',
            [AdminDashboard::class,'index']
        )->name('admin.dashboard');



        /*
        | Category CRUD
        */

        Route::resource('category', CategoryController::class);



        /*
        | Kursus CRUD Admin
        */

        Route::resource('kursus', KursusController::class)
            ->names([
                'index'   => 'admin.kursus.index',
                'create'  => 'admin.kursus.create',
                'store'   => 'admin.kursus.store',
                'show'    => 'admin.kursus.show',
                'edit'    => 'admin.kursus.edit',
                'update'  => 'admin.kursus.update',
                'destroy' => 'admin.kursus.destroy',
            ]);



        /*
        | Enrollment Admin
        */

        Route::get('/enrollment',
            [EnrollmentController::class,'index']
        )->name('enrollment.index');


    });





/*
|--------------------------------------------------------------------------
| PESERTA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:peserta'])
    ->prefix('peserta')
    ->group(function () {



        /*
        | Dashboard Peserta
        */

        Route::get('/dashboard',
            [ParticipantDashboard::class,'index']
        )->name('peserta.dashboard');



        /*
        | Katalog Kursus
        */

        Route::get('/katalog-kursus',
            [KursusController::class,'catalog']
        )->name('kursus.catalog');


    });





/*
|--------------------------------------------------------------------------
| Detail Kursus & Enrollment
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->group(function () {


        Route::get('/kursus/{kursus}',
            [KursusController::class,'show']
        )->name('kursus.show');



        Route::post('/kursus/{kursus}/enroll',
            [KursusController::class,'enroll']
        )->name('kursus.enroll');


    });





/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->group(function () {


        Route::get('/profile',
            [ProfileController::class,'edit']
        )->name('profile.edit');



        Route::patch('/profile',
            [ProfileController::class,'update']
        )->name('profile.update');



        Route::delete('/profile',
            [ProfileController::class,'destroy']
        )->name('profile.destroy');


    });





/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';