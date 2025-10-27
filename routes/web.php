<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. LANDING PAGE (DEFAULT) - DIARAHKAN KE LOGIN
// Semua akses ke / akan melihat halaman Login.
Route::get('/', function () {
    return redirect()->route('auth.login');
});

// 2. ROUTE DASHBOARD (PAGES) - Rute yang seharusnya diakses setelah login
Route::name('dashboard.index')->get('/dashboard', function () {
    return view('pages.attendance.recap'); 
});


// 3. KELOMPOK ROUTE MANAJEMEN PRESENSI
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/record', function () {
        return view('pages.attendance.record');
    })->name('record'); 
    
    Route::get('/recap', function () {
        return view('pages.attendance.recap'); 
    })->name('recap'); 
});

// 4. KELOMPOK ROUTE MANAJEMEN PELANGGARAN
Route::prefix('violations')->name('violations.')->group(function () {
    Route::get('/record', function () {
        return view('pages.violations.record');
    })->name('record'); 

    Route::get('/recap', function () {
        return view('pages.violations.recap');
    })->name('recap');  
});

// 5. KELOMPOK ROUTE OTENTIKASI
Route::name('auth.')->group(function () {
    // Halaman Login (Tujuan utama saat / diakses)
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    // Halaman Lupa Password (Meminta Email)
    Route::get('/forgot-password', function () {
        return view('pages.auth.forgot-password');
    })->name('password.request');
    
    // Halaman Reset Password (Ganti Password, diakses via 'email link')
    Route::get('/reset-password', function () {
        return view('pages.auth.reset-password');
    })->name('password.reset');

    // Route POST Logout DUMMY
    Route::post('/logout', function () {
        return redirect()->route('auth.login');
    })->name('logout');
});