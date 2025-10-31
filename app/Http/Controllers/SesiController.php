<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan form login
    public function index()
    {
        return view('pages.auth.login');
    }

    // Memproses form login
    public function login(Request $request)
    {
        // ✅ Validasi data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Lanjutkan proses login (cek user, autentikasi, dll)
        // Contoh sederhana:
        if ($request->email === 'admin@example.com' && $request->password === '123456') {
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
