<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. ROUTE UTAMA / DASHBOARD
Route::name('dashboard.index')->get('/', function () {
    return view('pages.attendance.recap'); 
});


// 2. KELOMPOK ROUTE MANAJEMEN PRESENSI
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/record', function () {
        return view('pages.attendance.record');
    })->name('record'); 
    
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

// 4. KELOMPOK ROUTE OTENTIKASI
Route::name('auth.')->group(function () {
    // Halaman Login (GET)
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    // Halaman Lupa Password (GET)
    Route::get('/forgot-password', function () {
        return view('pages.auth.forgot-password');
    })->name('password.request');

    // PERBAIKAN: Route POST Logout DUMMY untuk simulasi sign out dan mencegah error
    Route::post('/logout', function () {
        // Hanya melakukan redirect ke halaman login
        return redirect()->route('auth.login');
    })->name('logout');
});