<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('kursus', KursusController::class);



Route::middleware(['auth','role:admin'])
->group(function(){

    Route::get('/admin/dashboard',
        [AdminDashboard::class,'index']
    )
    ->name('admin.dashboard');


    Route::resource('category', CategoryController::class);


    Route::get('/enrollment',
        [EnrollmentController::class,'index']
    )
    ->name('enrollment.index');

});



Route::middleware(['auth','role:peserta'])
->group(function(){

    Route::get('/peserta/dashboard',
        [ParticipantDashboard::class,'index']
    )
    ->name('peserta.dashboard');

});



Route::get('/dashboard',
    [DashboardController::class,'index']
)
->middleware('auth')
->name('dashboard');



Route::get('/kursus/{kursus}',
    [KursusController::class,'show']
)
->name('kursus.show');



Route::post('/kursus/{kursus}/enroll',
    [KursusController::class,'enroll']
)
->middleware('auth')
->name('kursus.enroll');



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
Route::middleware(['auth','role:admin'])->group(function () {

    Route::get('/admin/dashboard', [
        AdminDashboard::class, 'index'
    ])->name('admin.dashboard');

    Route::resource('category', CategoryController::class);

    Route::resource('kursus', KursusController::class);

    Route::get('/enrollment', [
        EnrollmentController::class, 'index'
    ])->name('enrollment.index');
});

require __DIR__.'/auth.php';