<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SiswaController;

// =========================================================================
// 1. AUTHENTICATION & ROOT
// =========================================================================
Route::name('auth.')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login_view');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', fn() => view('pages.auth.forgot-password'))->name('password.request');
    Route::get('/reset-password', fn() => view('pages.auth.reset-password'))->name('password.reset');
});

// =========================================================================
// 2. DASHBOARD DEFAULT
// =========================================================================
Route::get('/dashboard', [PresensiController::class, 'recap'])
    ->name('dashboard.index')
    ->middleware('auth');

// =========================================================================
// 3. ROLE-BASED ROUTES
// =========================================================================

// 🔹 BK
Route::prefix('bk')->middleware(['auth', 'role.bk'])->group(function () {
    Route::get('/presensi/record', [PresensiController::class, 'record'])->name('presensi.record');
    Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');
    Route::get('/presensi/recap', [PresensiController::class, 'recap'])->name('presensi.recap');
    Route::post('/siswas/import', [SiswaController::class, 'import'])->name('siswas.import');

});

// 🔹 SPP
Route::prefix('spp')->middleware(['auth', 'role.spp'])->group(function () {
    Route::get('/dashboard', fn() => view('pages.spp_page.spp_dashboard'))->name('spp.dashboard');
});

// =========================================================================
// 4. ATTENDANCE MANAGEMENT
// =========================================================================
Route::prefix('attendance')->name('attendance.')->middleware('auth')->group(function () {
    Route::get('/record', [PresensiController::class, 'record'])->name('record');
    Route::post('/store', [PresensiController::class, 'store'])->name('store');
    Route::get('/recap', [PresensiController::class, 'recap'])->name('recap');
});

// =========================================================================
// 5. VIOLATIONS MANAGEMENT
// =========================================================================
Route::prefix('violations')->name('violations.')->group(function () {
    Route::get('/record', fn() => view('pages.violations.record'))->name('record');
    Route::get('/recap', fn() => view('pages.violations.recap'))->name('recap');
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
