<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/dashboard',
        [AdminDashboard::class,'index']
    )->name('admin.dashboard');


    Route::resource('category', CategoryController::class);


    Route::resource('kursus', KursusController::class);


    Route::get('/enrollment',
        [EnrollmentController::class,'index']
    )->name('enrollment.index');

});
/*
|--------------------------------------------------------------------------
| Dashboard umum
|--------------------------------------------------------------------------
*/

// hapus route DashboardController lama
// karena admin sudah memakai /admin/dashboard

/*
|--------------------------------------------------------------------------
| Peserta
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:peserta'])->group(function(){

    Route::get('/peserta/dashboard',
        [ParticipantDashboard::class,'index']
    )->name('peserta.dashboard');


    // Katalog Kursus Peserta
    Route::get('/katalog-kursus',
        [KursusController::class,'catalog']
    )->name('kursus.catalog');

});
/*
|--------------------------------------------------------------------------
| Kursus
|--------------------------------------------------------------------------
*/

Route::get('/kursus/{kursus}',
    [KursusController::class,'show']
)
->middleware('auth')
->name('kursus.show');


Route::post('/kursus/{kursus}/enroll',
    [KursusController::class,'enroll']
)
->middleware('auth')
->name('kursus.enroll');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])
    ->name('profile.edit');


    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])
    ->name('profile.update');


    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])
    ->name('profile.destroy');

});


require __DIR__.'/auth.php';