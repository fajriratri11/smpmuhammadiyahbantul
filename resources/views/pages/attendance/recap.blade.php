@extends('layouts.dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Rekap Presensi Siswa
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Perbaikan: Tambahkan dark:bg-gray-700 untuk latar belakang container --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">
            
            <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-gray-100">Filter Presensi</h2>
                <form class="flex flex-wrap items-center gap-4">
                    
                    {{-- Perbaikan: Tambahkan dark:bg-gray-800 dan dark:text-white pada elemen input/select --}}
                    <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Pilih Bulan</option>
                        <option value="10">Oktober 2025</option>
                        <option value="09">September 2025</option>
                    </select>
                    <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Semua Kelas</option>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                    {{-- Tombol (Warna sudah oke, karena biasanya menggunakan warna solid) --}}
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">Tampilkan Data</button>
                    <button type="button" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">Cetak Rekap</button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Tambahkan dark:text-white pada nilai, dan dark:text-gray-300 pada label --}}
                <div class="bg-green-50 p-5 rounded-lg shadow-md border-l-4 border-green-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Total Kehadiran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">95.0%</p>
                </div>
                {{-- Card lainnya juga perlu penyesuaian yang sama --}}
                <div class="bg-yellow-50 p-5 rounded-lg shadow-md border-l-4 border-yellow-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Total Sakit (S)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">25 Kasus</p>
                </div>
                <div class="bg-blue-50 p-5 rounded-lg shadow-md border-l-4 border-blue-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Izin (I)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">10 Kasus</p>
                </div>
                <div class="bg-red-50 p-5 rounded-lg shadow-md border-l-4 border-red-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-red-600 dark:text-red-400">Total Tanpa Keterangan (A)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">5 Kasus</p>
                </div>
            </div>

            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Rekapitulasi Presensi Kelas X - B (Oktober)</h2>
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    {{-- Perbaikan: Teks header putih, latar belakang gelap --}}
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Hadir (H)</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Sakit (S)</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Izin (I)</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Alpa (A)</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total Hari</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Persentase Hadir</th>
                        </tr>
                    </thead>
                    {{-- Perbaikan: Latar belakang body tabel lebih gelap, teks putih --}}
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">12345</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Agus Salim</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">18</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">0</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">20</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-semibold text-green-600 dark:text-green-400">90%</td>
                        </tr>
                        {{-- Baris-baris data lain juga perlu penyesuaian yang sama --}}
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</main>
@endsection