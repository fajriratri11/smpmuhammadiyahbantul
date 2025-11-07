<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lupa Password - {{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center justify-center min-h-screen flex-col">
        <div class="flex items-center justify-center w-full lg:grow">
            <main class="flex max-w-[335px] w-full flex-col lg:max-w-md">
                
                <div class="mb-6 flex items-center justify-center">
                    <h1 class="text-2xl font-semibold dark:text-[#EDEDEC]">
                        Lupa Password
                    </h1>
                </div>

                <div class="p-6 lg:p-8 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-xl rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <p class="mb-4 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        Masukkan alamat email yang terdaftar pada akun Anda. Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
                    </p>
                    
                    {{-- FORMULIR KONFIRMASI EMAIL --}}
                    {{-- Menggunakan method="GET" untuk menghindari error POST/CSRF di frontend --}}
                    <form action="{{ route('auth.password.request') }}" method="POST" class="space-y-6">
                        @csrf
                        {{-- Input Email --}}
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border dark:border-[#3E3E3A] border-[#e3e3e0] rounded-sm dark:bg-[#1b1b18] dark:text-[#EDEDEC] text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="nama@sekolah.sch.id" required autofocus>
                        </div>
                        
                        {{-- Tombol Kirim Reset Link --}}
                        <button type="submit" class="w-full inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-2 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal font-medium transition-colors">
                            Kirim Tautan Reset Password
                        </button>
                    </form>

                    {{-- Tautan Kembali ke Login --}}
                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-[#f53003] dark:text-[#FF4433] hover:underline">
                            Kembali ke Halaman Login
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>