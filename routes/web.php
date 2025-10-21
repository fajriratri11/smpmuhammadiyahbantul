<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. ROUTE UTAMA / DASHBOARD
// SEKARANG MENUNJUK KE REKAP PRESENSI YANG BARU ANDA PINDAHKAN
Route::name('dashboard.index')->get('/', function () {
    // Ubah dari 'pages.practice.index' menjadi 'pages.attendance.recap'
    return view('pages.attendance.recap'); 
});


// 2. KELOMPOK ROUTE MANAJEMEN PRESENSI
Route::prefix('attendance')->name('attendance.')->group(function () {
    // Pencatatan Harian
    Route::get('/record', function () {
        return view('pages.attendance.record');
    })->name('record'); 
    
    // Rekap Presensi (Jika diakses melalui sidebar)
    Route::get('/recap', function () {
        return view('pages.attendance.recap'); 
    })->name('recap'); 
});

// 3. KELOMPOK ROUTE MANAJEMEN PELANGGARAN
Route::prefix('violations')->name('violations.')->group(function () {
    Route::get('/record', function () {
        return view('pages.violations.record');
    })->name('record'); 

    Route::get('/recap', function () {
        return view('pages.violations.recap');
    })->name('recap');   
});