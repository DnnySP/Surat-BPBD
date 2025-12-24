<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('surat', SuratController::class);
Route::get('/laporan', [SuratController::class, 'laporan'])->name('surat.laporan');