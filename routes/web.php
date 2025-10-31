<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. LANDING PAGE (DEFAULT) - DIARAHKAN KE LOGIN (TETAP GET)
// Rute ini harus GET agar bisa diakses browser secara normal.
Route::get('/', function () {
    return redirect()->route('auth.login');
});

// 2. ROUTE DASHBOARD (PAGES) - Rute yang seharusnya diakses setelah login
// Rute Dashboard diubah menjadi MATCH(['GET', 'POST']) agar bisa menerima submit form Login (POST)
Route::name('dashboard.index')->match(['GET', 'POST'], '/dashboard', function () {
    return view('pages.attendance.recap'); 
});


// 3. KELOMPOK ROUTE MANAJEMEN PRESENSI (TETAP GET)
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/record', function () {
        return view('pages.attendance.record');
    })->name('record'); 
    
    Route::get('/recap', function () {
        return view('pages.attendance.recap'); 
    })->name('recap'); 
});

// 4. KELOMPOK ROUTE MANAJEMEN PELANGGARAN (TETAP GET)
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
    // Tampilan Halaman Login (TETAP GET agar bisa dilihat)
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    // Proses Submit Login (BARU: POST)
    Route::post('/login', function () {
        // Karena ini simulasi, kita redirect ke Dashboard setelah POST
        return redirect()->route('dashboard.index');
    })->name('login.post'); // Diberi nama baru agar tidak konflik dengan auth.login (GET)

    // Tampilan Halaman Lupa Password (TETAP GET)
    Route::get('/forgot-password', function () {
        return view('pages.auth.forgot-password');
    })->name('password.request');
    
    // Proses Submit Lupa Password (BARU: POST)
    Route::post('/forgot-password', function () {
        // Karena ini simulasi, kita redirect kembali ke halaman yang sama (simulasi kirim email)
        return redirect()->route('auth.password.request')->with('status', 'Tautan reset sudah dikirim!');
    })->name('password.email');
    
    // Tampilan Halaman Reset Password (TETAP GET)
    Route::get('/reset-password', function () {
        return view('pages.auth.reset-password');
    })->name('password.reset');

    // Proses Submit Reset Password (BARU: POST)
    Route::post('/reset-password', function () {
        // Karena ini simulasi, kita redirect ke halaman Login setelah POST
        return redirect()->route('auth.login')->with('status', 'Password berhasil diubah!');
    })->name('password.update');

    // Route Logout (BARU: POST)
    Route::post('/logout', function () {
        return redirect()->route('auth.login');
    })->name('logout');
});