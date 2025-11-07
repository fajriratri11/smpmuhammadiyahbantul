<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Menampilkan halaman forgot password
    public function showForgotForm()
    {
        return view('pages.auth.forgot-password'); 
    }

    // (opsional) kirim link reset password — belum diaktifkan
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        return back()->with('status', 'Link reset password telah dikirim ke email (fitur ini belum aktif).');
    }
}
