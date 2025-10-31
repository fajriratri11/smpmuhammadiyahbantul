<?php

use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. ROUTE UTAMA / HALAMAN LOGIN
Route::get('/', function () {
    return view('pages.auth.login'); 
})->name('auth.login');

// 2. KELOMPOK ROUTE DASHBOARD
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        return view('pages.spp_page.spp_dashboard'); 
    })->name('index');
});

// 3. KELOMPOK ROUTE MANAJEMEN PRESENSI
Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_dashboard', function () {
        return view('pages.spp_page.spp_dashboard');
    })->name('spp_dashboard'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_pembayaranspp', function () {
        return view('pages.spp_page.spp_pembayaranspp');
    })->name('spp_pembayaranspp'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_datasiswa', function () {
        return view('pages.spp_page.spp_datasiswa');
    })->name('spp_datasiswa'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_tahunajaran', function () {
        return view('pages.spp_page.spp_tahunajaran');
    })->name('spp_tahunajaran'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_kelas', function () {
        return view('pages.spp_page.spp_kelas');
    })->name('spp_kelas'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_kenaikankelas', function () {
        return view('pages.spp_page.spp_kenaikankelas');
    })->name('spp_kenaikankelas'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_kelulusansiswa', function () {
        return view('pages.spp_page.spp_kelulusansiswa');
    })->name('spp_kelulusansiswa'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_detail_kelas_spp', function () {
        return view('pages.spp_page.spp_detail_kelas_spp');
    })->name('spp_detail_kelas_spp'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_detail_pembayaran_siswa', function () {
        return view('pages.spp_page.spp_detail_pembayaran_siswa');
    })->name('spp_detail_pembayaran_siswa'); 
    
});

Route::prefix('spp_page')->name('spp_page.')->group(function () {
    Route::get('/spp_notifikasi_tunggakan_wa', function () {
        return view('pages.spp_page.spp_notifikasi_tunggakan_wa');
    })->name('spp_notifikasi_tunggakan_wa'); 
    
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
    // Halaman Login (GET)
    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    // Halaman Lupa Password (GET)
    Route::get('/forgot-password', function () {
        return view('pages.auth.forgot-password');
    })->name('password.request');

    // Route POST Logout Dummy
    Route::post('/logout', function () {
        return redirect()->route('auth.login');
    })->name('logout');
});
