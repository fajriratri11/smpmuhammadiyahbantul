@extends('layouts.spp-dashboard')

@section('content')
{{-- HEADER Halaman (Mengikuti format konsisten) --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Manajemen Kelulusan Siswa
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Konten Utama berada di dalam shadow box besar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- ALERT WARNING --}}
            {{-- Menggunakan style notifikasi block: bg-red-50/900, border-red-400 --}}
            <div class="bg-red-50 dark:bg-red-900 p-4 rounded-lg border-l-4 border-red-400 mb-6">
                <p class="text-sm text-red-800 dark:text-red-200 font-semibold">
                    ⚠️ **Peringatan!** Halaman ini digunakan untuk mengubah status siswa menjadi <span class="underline">lulus</span>. 
                    Pastikan siswa yang diproses adalah siswa kelas akhir.
                </p>
            </div>

            {{-- GRID UTAMA --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- KOLOM KIRI - PROSES KELULUSAN --}}
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-600">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3">Siswa Kelas Akhir</h2>

                    <select class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 mb-4 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Kelas --</option>
                        <option value="IX A">IX A</option>
                        <option value="IX B">IX B</option>
                        <option value="IX C">IX C</option>
                    </select>

                    <div class="overflow-x-auto shadow-md md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                                {{-- Contoh 1: Belum Lulus (Kuning/Peringatan Style) --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">2023001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Ahmad Fikri</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-200">Belum Lulus</span>
                                    </td>
                                </tr>
                                {{-- Contoh 2: Sudah Lulus (Hijau/Aktif Style) --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">2023002</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Budi Santoso</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Lulus</span>
                                    </td>
                                </tr>
                                {{-- Baris data kosong yang asli --}}
                                {{-- <tr>
                                    <td colspan="4" class="text-center py-4 text-sm text-gray-500 dark:text-gray-400">Data Siswa Kelas Akhir Belum Dipilih</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md text-sm transition duration-150">
                            ➤ Proses Lulus
                        </button>
                        <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-md text-sm transition duration-150">
                            ⬅ Batal Lulus
                        </button>
                    </div>
                </div>

                {{-- KOLOM KANAN - DATA LULUS --}}
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4 border border-gray-200 dark:border-gray-600">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3">Daftar Siswa Lulus</h2>

                    <div class="overflow-x-auto shadow-md md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                                {{-- Contoh Data Lulus --}}
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">2022001</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Citra Dewi</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Lulus</span>
                                    </td>
                                </tr>
                                {{-- Baris data kosong yang asli --}}
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-sm text-gray-500 dark:text-gray-400">Belum ada siswa yang dinyatakan Lulus</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection