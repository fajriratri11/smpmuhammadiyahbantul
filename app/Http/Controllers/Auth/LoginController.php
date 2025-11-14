<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    /**
     * Proses login berdasarkan NIS dan Password
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ], [
            'nis.required' => 'NIS wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Ambil kredensial
        $credentials = [
            'nis' => $request->nis,
            'password' => $request->password,
        ];

        // Proses login
        if (Auth::attempt($credentials, $request->remember)) {
            $user = Auth::user();

            // 🔹 Redirect berdasarkan role
            if ($user->role === 'bk') {
                return redirect()->intended('/attendance/record');
            } elseif ($user->role === 'spp') {
                return redirect()->intended('/spp_page/spp_dashboard');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'login_error' => 'NIS atau Password salah. Silakan coba lagi.',
        ])->withInput($request->only('nis'));
    }

    /**
     * Logout pengguna
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
