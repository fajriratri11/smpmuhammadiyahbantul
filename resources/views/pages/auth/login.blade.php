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

        {{-- KOLOM KIRI --}}
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

                <div class="p-6 lg:p-8 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-xl rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <h2 class="mb-6 font-medium text-lg text-center">Login Bimbingan Konseling</h2>
                    
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

                {{-- Remember Me + Forgot --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat Saya</span>
                    </label>
                    <a href="{{ route('auth.password.request') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                        Lupa Password?
                    </a>
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-2.5 rounded-md font-medium text-sm shadow-md transition-all duration-300">
                    Masuk Sekarang
                </button>
            </form>

            {{-- Garis Pemisah --}}
            <div class="flex items-center justify-center my-6">
                <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
                <span class="mx-2 text-gray-400 text-sm">atau</span>
                <span class="w-1/4 border-t border-gray-300 dark:border-gray-600"></span>
            </div>

            {{-- Info --}}
            <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                Gunakan akun yang telah diberikan oleh wali kelas atau admin sekolah.
            </p>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="py-4 text-center text-sm text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-[#3E3E3A]">
        © {{ date('Y') }} SMP Muhammadiyah Bantul. Semua hak cipta dilindungi.
    </footer>
</body>
</html>
