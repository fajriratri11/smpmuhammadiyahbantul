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
