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

// 4. KELOMPOK ROUTE MANAJEMEN PELANGGARAN
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

    // Route POST Logout Dummy
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
