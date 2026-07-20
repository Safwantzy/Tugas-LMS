<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Participant\DashboardController as ParticipantDashboard;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','role:admin'])
->group(function(){

    Route::get('/admin/dashboard',
        [AdminDashboard::class,'index']
    )
    ->name('admin.dashboard');

    Route::resource('category', CategoryController::class);

});


Route::middleware(['auth','role:peserta'])
->group(function(){

    Route::get('/peserta/dashboard',
        [ParticipantDashboard::class,'index']
    )
    ->name('peserta.dashboard');

});


Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        App\Http\Controllers\ProfileController::class,
        'edit'
    ])->name('profile.edit');


    Route::patch('/profile', [
        App\Http\Controllers\ProfileController::class,
        'update'
    ])->name('profile.update');


    Route::delete('/profile', [
        App\Http\Controllers\ProfileController::class,
        'destroy'
    ])->name('profile.destroy');

});