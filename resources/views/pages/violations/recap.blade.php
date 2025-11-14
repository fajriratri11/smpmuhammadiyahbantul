@extends('layouts.dashboard')

@section('content')
{{-- HEADER --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Rekap Pelanggaran Siswa
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- CONTAINER UTAMA --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">
            
            <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-white">Filter Data</h2>
                <form class="flex flex-wrap items-center gap-4">
                    <input type="text" placeholder="Cari NIS/Nama Siswa..." class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Semua Kelas</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                    <input type="date" class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <input type="date" class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 text-sm">Terapkan Filter</button>
                    <button type="button" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-600">Reset</button>
                    <button type="button" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">Cetak Rekap</button>
               
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-indigo-50 p-5 rounded-lg shadow-md dark:bg-gray-800">
                    <p class="text-sm font-medium text-indigo-600 dark:text-indigo-400">Total Pelanggaran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">125</p>
                </div>
                {{-- **BAGIAN BARU: Jumlah Pelanggaran Berat** --}}
                <div class="bg-red-50 p-5 rounded-lg shadow-md dark:bg-gray-800">
                    <p class="text-sm font-medium text-red-600 dark:text-red-400">Jumlah Pelanggaran Berat</p>
                    {{-- Ganti dengan variabel yang sesuai (misalnya: $pelanggaranBeratCount) --}}
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">8</p> 
                </div>
                {{-- **AKHIR BAGIAN BARU** --}}
                <div class="bg-green-50 p-5 rounded-lg shadow-md dark:bg-gray-800">
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Siswa Tanpa Pelanggaran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">85%</p>
                </div>
            </div>

            ---

            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Riwayat Detail Pelanggaran</h2>
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            {{-- KOLOM DISESUAIKAN DENGAN FIELD RECORD --}}
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jenis Pelanggaran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Pelapor</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2024-10-18</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">12345</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Budi Santoso</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">Sedang</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate dark:text-gray-300">Terlambat masuk sekolah 30 menit tanpa alasan.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Ibu Sari</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2024-10-17</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">98765</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Siti Aisyah</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">Ringan</span>
                            </td>
                            
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate dark:text-gray-300">Tidak membawa buku pelajaran saat jam mata pelajaran.</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Pak Joni</td>
                        </tr>
                        </tbody>
                </table>
            </div>

            <div class="mt-4">
                <p class="text-sm text-gray-700 dark:text-gray-300">
                    Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">125</span> hasil
                </p>
            </div>
            
        </div>
    </div>
</main>
@endsection