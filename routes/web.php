<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\MatchmakingController;

// Route Halaman Form Pelaporan
Route::get('/lapor-banjir', [LaporBanjirController::class, 'index'])->name('banjir.index');

// Route Proses Kirim Data (POST)
Route::post('/lapor-banjir', [LaporBanjirController::class, 'store'])->name('banjir.store');

// 1. Landing / Beranda Kolaborasa
Route::get('/', function () {
    return view('kolaborasa.beranda');
})->name('kolaborasa.beranda');

// 2. Eksplorasi Ide & Proyek
Route::get('/proyek', function () {
    return view('kolaborasa.proyek');
})->name('kolaborasa.proyek');

// 3. Form Input Ide / Buat Proyek Baru
Route::get('/proyek/buat', function () {
    return view('kolaborasa.buat_proyek');
})->name('kolaborasa.buat_proyek');

// 4. Kalkulator Matchmaking / Pengolahan Skill Team
Route::get('/matchmaking', function () {
    return view('kolaborasa.matchmaking');
})->name('kolaborasa.matchmaking');

// 5. Profil Pengguna & Skill Matrix
Route::get('/profil', function () {
    return view('kolaborasa.profil');
})->name('kolaborasa.profil');



Route::get('/matchmaking-sim', [MatchmakingController::class, 'index'])->name('matchmaking.index');
Route::post('/matchmaking-sim', [MatchmakingController::class, 'proses'])->name('matchmaking.proses');