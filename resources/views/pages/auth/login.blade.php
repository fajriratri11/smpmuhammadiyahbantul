<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Akademik - {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-[#0a0a0a] dark:via-[#1a1a1a] dark:to-[#0d0d0d] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col">

    {{-- HEADER --}}
    <header class="flex items-center justify-center py-6 bg-white/80 dark:bg-[#161615]/70 backdrop-blur-md border-b border-gray-200 dark:border-[#3E3E3A] shadow-sm">
        <div class="flex flex-col items-center space-y-2">
            <img src="{{ asset('static/images/logo.png')}}" alt="Logo Sekolah" class="w-20 h-20 object-contain drop-shadow-md">
            <h1 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-100">
                SMP Muhammadiyah Bantul
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                SMP Muhammadiyah - Tahun Ajaran 2025/2026
            </p>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <main class="flex flex-col lg:flex-row flex-1 items-start justify-center p-6 lg:p-10 gap-10">

        {{-- KOLOM KIRI (INFO) --}}
        <section class="flex-1 grid grid-cols-1 gap-6 max-w-2xl">

            {{-- INFO PENGUMUMAN --}}
            <div class="p-6 bg-white/90 dark:bg-[#161615] border border-gray-200 dark:border-[#3E3E3A] rounded-2xl shadow-md hover:shadow-lg transition-all duration-300">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    📢 <span>Info Pengumuman</span>
                </h2>
                <ul class="text-sm space-y-2 text-gray-600 dark:text-gray-300 leading-relaxed">
                    <li>• Pendaftaran ulang siswa kelas 8 dibuka hingga <b>30 Oktober 2025</b>.</li>
                    <li>• Ujian Tengah Semester (UTS) dimulai <b>10 November 2025</b>.</li>
                    <li>• Harap perbarui data wali kelas di sistem sebelum akhir bulan.</li>
                </ul>
            </div>

            {{-- INFO AKADEMIK --}}
            <div class="p-6 bg-white/90 dark:bg-[#161615] border border-gray-200 dark:border-[#3E3E3A] rounded-2xl shadow-md hover:shadow-lg transition-all duration-300">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    🎓 <span>Info Akademik</span>
                </h2>
                <ul class="text-sm space-y-2 text-gray-600 dark:text-gray-300 leading-relaxed">
                    <li>• Jadwal pelajaran terbaru sudah tersedia di menu Akademik.</li>
                    <li>• Nilai rapor semester genap akan diumumkan pada <b>20 Desember 2025</b>.</li>
                </ul>
            </div>

            {{-- BERITA SEKOLAH --}}
            <div class="p-6 bg-white/90 dark:bg-[#161615] border border-gray-200 dark:border-[#3E3E3A] rounded-2xl shadow-md hover:shadow-lg transition-all duration-300">
                <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    📰 <span>Berita Sekolah</span>
                </h2>
                <div class="space-y-4">
                    <div class="border-l-4 border-blue-500 pl-3">
                        <h3 class="font-medium text-gray-800 dark:text-gray-100">Lomba Sains Antar SMP</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Tim Sains SMP Harapan Bangsa berhasil meraih <b>Juara 1</b> lomba tingkat kota! 🎉
                        </p>
                    </div>
                    <div class="border-l-4 border-green-500 pl-3">
                        <h3 class="font-medium text-gray-800 dark:text-gray-100">Program Literasi Sekolah</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Kegiatan membaca 15 menit sebelum pelajaran dimulai akan dimulai minggu depan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- KOLOM KANAN: FORM LOGIN --}}
        <section class="max-w-md w-full lg:max-w-xs xl:max-w-sm shrink-0">
            <div class="p-6 lg:p-8 bg-white/90 dark:bg-[#161615] dark:text-[#EDEDEC] shadow-xl rounded-2xl border border-gray-200 dark:border-[#3E3E3A]">
                <h2 class="mb-6 font-semibold text-xl text-center">Login Portal Akademik</h2>

                {{-- PESAN ERROR --}}
                @if ($errors->has('login_error'))
                    <div class="mb-4 p-3 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-300" role="alert">
                        {{ $errors->first('login_error') }}
                    </div>
                @endif

                {{-- FORM LOGIN --}}
                <form action="{{ route('auth.login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- NIS --}}
                    <div>
                        <label for="nis" class="block mb-1 text-sm font-medium text-gray-800 dark:text-gray-100">Nomor Induk Siswa (NIS)</label>
                        <input type="text" id="nis" name="nis"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-[#3E3E3A] rounded-md dark:bg-[#1b1b18] dark:text-[#EDEDEC] text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nis') border-red-500 @enderror"
                            placeholder="Masukkan NIS Anda" required autofocus value="{{ old('nis') }}">
                        @error('nis')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Password + Toggle Eye --}}
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-800 dark:text-gray-100">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 dark:border-[#3E3E3A] rounded-md dark:bg-[#1b1b18] dark:text-[#EDEDEC] text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="••••••••" required>
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                                <!-- Mata terbuka -->
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <!-- Mata tertutup -->
                                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18M10.477 10.477A3 3 0 0012 15a3 3 0 002.523-4.523M9.88 9.88A5 5 0 0112 7c2.485 0 4.637 1.507 5.657 3.657M6.343 6.343A9.958 9.958 0 002.458 12c1.274 4.057 5.065 7 9.542 7a9.956 9.956 0 005.657-1.757" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember Me + Forgot --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat Saya</span>
                        </label>
                        <a href="{{ route('auth.password.request') }}"
                            class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            Lupa Password?
                        </a>
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit" id="loginBtn"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-2.5 rounded-md font-medium text-sm shadow-md transition-all duration-300">
                        Masuk Sekarang
                    </button>
                </form>

                {{-- Pemisah --}}
                <div class="flex items-center justify-center my-6">
                    <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
                    <span class="mx-2 text-gray-400 text-sm">atau</span>
                    <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
                </div>

                <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                    Gunakan akun yang telah diberikan oleh wali kelas atau admin sekolah.
                </p>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="py-4 text-center text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-[#3E3E3A]">
        © {{ date('Y') }} SMP Muhammadiyah Bantul. Semua hak cipta dilindungi.
    </footer>

    {{-- Script tambahan --}}
    <script>
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        toggleButton.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeOpen.classList.toggle('hidden');
            eyeClosed.classList.toggle('hidden');
        });

        // Efek loading tombol login
        document.querySelector('form').addEventListener('submit', e => {
            const btn = document.getElementById('loginBtn');
            btn.innerHTML = 'Memproses...';
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
        });
    </script>

</body>
</html>
