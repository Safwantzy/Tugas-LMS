<?php
use App\Http\Controllers\ProdukController;

Route::get('/', [ProdukController::class, 'beranda']);