@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-indigo-600 shadow-lg dark:bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-white">
            Portal Informasi SPP Siswa
        </h1>
        <p class="text-indigo-200 dark:text-gray-400 mt-1">Selamat datang, {{ $siswa->nama_wali ?? 'Wali Murid' }}</p>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- INFORMASI SISWA --}}
            <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-gray-100">Data Siswa</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm text-gray-700 dark:text-gray-200">
                    <div><span class="font-semibold">Nama:</span> Siti Aisyah</div>
                    <div><span class="font-semibold">NIS:</span> 230154</div>
                    <div><span class="font-semibold">Kelas:</span> VIII B</div>
                    <div><span class="font-semibold">Wali:</span> Ibu Fatimah</div>
                    <div><span class="font-semibold">Tahun Ajaran:</span> 2025/2026</div>
                </div>
            </div>

            {{-- CARD STATUS PEMBAYARAN --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-green-50 p-5 rounded-lg shadow-md border-l-4 border-green-500 dark:bg-gray-800 dark:border-green-600">
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Total Sudah Dibayar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">Rp 1.500.000</p>
                </div>
                <div class="bg-yellow-50 p-5 rounded-lg shadow-md border-l-4 border-yellow-500 dark:bg-gray-800 dark:border-yellow-600">
                    <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Tagihan Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">Rp 150.000</p>
                </div>
                <div class="bg-blue-50 p-5 rounded-lg shadow-md border-l-4 border-blue-500 dark:bg-gray-800 dark:border-blue-600">
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Status Pembayaran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">Lunas</p>
                </div>
                <div class="bg-purple-50 p-5 rounded-lg shadow-md border-l-4 border-purple-500 dark:bg-gray-800 dark:border-purple-600">
                    <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Pembayaran Terakhir</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">25 Okt 2025</p>
                </div>
            </div>

            {{-- PROGRESS BAR --}}
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-3 dark:text-white">Progres Pembayaran Tahun Ajaran 2025/2026</h2>
                <div class="w-full bg-gray-200 rounded-full h-3 dark:bg-gray-600">
                    <div class="bg-green-600 h-3 rounded-full transition-all duration-500" style="width: 80%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-1 dark:text-gray-300">8 dari 10 bulan telah dibayar (80%)</p>
            </div>

            {{-- RIWAYAT PEMBAYARAN --}}
            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Riwayat Pembayaran</h2>
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg mb-10">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Bulan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jumlah</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">Juli</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">Rp 150.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Lunas</span>
                            </td>
                            <td class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-200">2 Jul 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">Oktober</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">Rp 150.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-200">Dicicil</span>
                            </td>
                            <td class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-200">25 Okt 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">November</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">Rp 150.000</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded dark:bg-red-700 dark:text-red-200">Belum Bayar</span>
                            </td>
                            <td class="px-6 py-4 text-right text-sm text-gray-900 dark:text-gray-200">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- INFO / BERITA SEKOLAH --}}
            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Info & Berita Sekolah</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Item Info --}}
                <div class="bg-blue-50 dark:bg-gray-800 p-5 rounded-lg shadow-md border-l-4 border-blue-500">
                    <h3 class="text-base font-semibold text-blue-700 dark:text-blue-300 mb-2">📢 Pengumuman Pembayaran SPP</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Pembayaran SPP bulan November dibuka mulai tanggal <b>1 s.d 10 November 2025</b>.
                        Harap melakukan pembayaran tepat waktu agar tidak dikenakan denda keterlambatan.
                    </p>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Diposting: 29 Okt 2025</p>
                </div>

                <div class="bg-green-50 dark:bg-gray-800 p-5 rounded-lg shadow-md border-l-4 border-green-500">
                    <h3 class="text-base font-semibold text-green-700 dark:text-green-300 mb-2">🏫 Libur Semester Ganjil</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Sekolah akan libur mulai tanggal <b>22 Desember 2025</b> dan masuk kembali pada
                        <b>5 Januari 2026</b>. Selamat berlibur dan tetap jaga kesehatan!
                    </p>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Diposting: 27 Okt 2025</p>
                </div>

                <div class="bg-yellow-50 dark:bg-gray-800 p-5 rounded-lg shadow-md border-l-4 border-yellow-500">
                    <h3 class="text-base font-semibold text-yellow-700 dark:text-yellow-300 mb-2">💡 Pemberitahuan Sistem</h3>
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Fitur cetak bukti pembayaran kini bisa diakses langsung melalui menu
                        <b>“Riwayat Pembayaran”</b>. Silakan unduh bukti setelah transaksi dikonfirmasi.
                    </p>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Diposting: 20 Okt 2025</p>
                </div>
            </div>

            {{-- CATATAN --}}
            <div class="mt-8 bg-blue-50 dark:bg-gray-800 border-l-4 border-blue-600 p-4 rounded-md">
                <p class="text-sm text-blue-700 dark:text-blue-300">
                    💡 Pastikan pembayaran dilakukan sebelum tanggal 10 setiap bulan. Bukti pembayaran dapat diunduh setelah dikonfirmasi oleh pihak sekolah.
                </p>
            </div>

        </div>
    </div>
</main>
@endsection
