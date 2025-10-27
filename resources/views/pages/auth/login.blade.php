<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - {{ config('app.name', 'Laravel') }}</title>

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
                
                {{-- Logo/Header Aplikasi --}}
                <div class="mb-6 flex items-center justify-center">
                    <h1 class="text-2xl font-semibold dark:text-[#EDEDEC]">
                        SMP MUHAMMADIYAH BANTUL
                    </h1>
                </div>

                <div class="p-6 lg:p-8 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-xl rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h2 class="mb-6 font-medium text-lg text-center">Login</h2>
                    
                    {{-- PERBAIKAN: Menggunakan method="GET" dan action diarahkan ke Dashboard --}}
                    <form action="{{ route('dashboard.index') }}" method="GET" class="space-y-6">
                        
                        {{-- Directive @csrf dihapus karena metode sekarang adalah GET --}}
                        
                        {{-- Input Email --}}
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border dark:border-[#3E3E3A] border-[#e3e3e0] rounded-sm dark:bg-[#1b1b18] dark:text-[#EDEDEC] text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="nama@sekolah.sch.id" required autofocus>
                        </div>
                        
                        {{-- Input Password --}}
                        <div>
                            <label for="password" class="block mb-1 text-sm font-medium">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border dark:border-[#3E3E3A] border-[#e3e3e0] rounded-sm dark:bg-[#1b1b18] dark:text-[#EDEDEC] text-sm focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="••••••••" required>
                        </div>

                        {{-- Opsi Remember Me dan Lupa Password --}}
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" class="w-4 h-4 text-[#f53003] border-gray-300 rounded focus:ring-[#f53003] dark:bg-gray-700 dark:border-gray-600">
                                <label for="remember" class="ml-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Ingat Saya</label>
                            </div>
                            <a href="{{ route('auth.password.request') }}" class="text-sm font-medium text-[#f53003] dark:text-[#FF4433] hover:underline">
                                Lupa Password?
                            </a>
                        </div>

                        {{-- Tombol Login --}}
                        <button type="submit" class="w-full inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-2 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal font-medium transition-colors">
                            Masuk
                        </button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>