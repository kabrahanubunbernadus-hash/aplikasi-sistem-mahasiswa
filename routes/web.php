<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'index'])->name('home');
Route::resource('mahasiswa', MahasiswaController::class);