<?php

use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| This file contains the web routes for your application, organized into
| logical groups to remove duplication and improve readability.
*/

// =========================================================================
// 1. AUTHENTICATION & ROOT
// Routes for Login, Logout, and Password Management.
// The root URL ('/') is set to display the Login page.
// =========================================================================
Route::name('auth.')->group(function () {
    // ROUTE UTAMA: Landing Page / Login View (GET /)
    Route::get('/', function () {
        return view('pages.auth.login');
    })->name('login');

    // Login View (Alternative to '/')
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login_view');

    // Proses Submit Login (POST) - Simulation
    Route::post('/login', function () {
        // Redirect to dashboard after successful (simulated) login
        return redirect()->route('dashboard.index');
    })->name('login.post');

    // Tampilan Halaman Lupa Password (GET)
    Route::get('/forgot-password', function () {
        return view('pages.auth.forgot-password');
    })->name('password.request');

    // Proses Submit Lupa Password (POST) - Simulation
    Route::post('/forgot-password', function () {
        return redirect()->route('auth.password.request')->with('status', 'Tautan reset sudah dikirim!');
    })->name('password.email');

    // Tampilan Halaman Reset Password (GET)
    Route::get('/reset-password', function () {
        return view('pages.auth.reset-password');
    })->name('password.reset');

    // Proses Submit Reset Password (POST) - Simulation
    Route::post('/reset-password', function () {
        return redirect()->route('auth.login')->with('status', 'Password berhasil diubah!');
    })->name('password.update');

    // Route Logout (POST) - Simulation
    Route::post('/logout', function () {
        return redirect()->route('auth.login');
    })->name('logout');
});


// =========================================================================
// 2. DASHBOARD
// The main landing page after login.
// =========================================================================
Route::get('/dashboard', function () {
    // Assuming 'spp_dashboard' is the intended dashboard view after login based on original code.
    return view('pages.attendance.recap');
})->name('dashboard.index');


// =========================================================================
// 3. SPP (SUMBANGAN PEMBINAAN PENDIDIKAN) MANAGEMENT
// All 'spp_page' routes consolidated into a single group.
// =========================================================================
Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_dashboard', function () {
        return view('pages.spp_page.spp_dashboard');
    })->name('spp_dashboard');

    Route::get('/spp_pembayaranspp', function () {
        return view('pages.spp_page.spp_pembayaranspp');
    })->name('spp_pembayaranspp');

    Route::get('/spp_datasiswa', function () {
        return view('pages.spp_page.spp_datasiswa');
    })->name('spp_datasiswa');

    Route::get('/spp_tahunajaran', function () {
        return view('pages.spp_page.spp_tahunajaran');
    })->name('spp_tahunajaran');

    Route::get('/spp_kelas', function () {
        return view('pages.spp_page.spp_kelas');
    })->name('spp_kelas');

    Route::get('/spp_kenaikankelas', function () {
        return view('pages.spp_page.spp_kenaikankelas');
    })->name('spp_kenaikankelas');

    Route::get('/spp_kelulusansiswa', function () {
        return view('pages.spp_page.spp_kelulusansiswa');
    })->name('spp_kelulusansiswa');

    Route::get('/spp_detail_kelas_spp', function () {
        return view('pages.spp_page.spp_detail_kelas_spp');
    })->name('spp_detail_kelas_spp');

    Route::get('/spp_detail_pembayaran_siswa', function () {
        return view('pages.spp_page.spp_detail_pembayaran_siswa');
    })->name('spp_detail_pembayaran_siswa');

    Route::get('/spp_notifikasi_tunggakan_wa', function () {
        return view('pages.spp_page.spp_notifikasi_tunggakan_wa');
    })->name('spp_notifikasi_tunggakan_wa');
});


// =========================================================================
// 4. ATTENDANCE MANAGEMENT
// Consolidated all attendance routes.
// =========================================================================
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/record', function () {
        return view('pages.attendance.record');
    })->name('record');

    Route::get('/recap', function () {
        return view('pages.attendance.recap');
    })->name('recap');
});


// =========================================================================
// 5. VIOLATIONS MANAGEMENT
// Consolidated all violations routes.
// =========================================================================
Route::prefix('violations')->name('violations.')->group(function () {
    Route::get('/record', function () {
        return view('pages.violations.record');
    })->name('record');

    Route::get('/recap', function () {
        return view('pages.violations.recap');
    })->name('recap');
});
