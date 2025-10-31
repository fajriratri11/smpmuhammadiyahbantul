@extends('layouts.spp-dashboard')

@section('content')
{{-- HEADER Halaman (Mengikuti format konsisten) --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Manajemen Kenaikan Kelas
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Konten Utama berada di dalam shadow box besar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- ALERT WARNING --}}
            {{-- Menggunakan style yang mirip dengan 'Catatan/Info' pada contoh pertama --}}
            <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-400 mb-6">
                <p class="text-sm text-yellow-800 dark:text-yellow-200 font-semibold">
                    ⚠️ Halaman ini digunakan untuk memproses kenaikan kelas siswa. 
                    Pastikan data siswa dan kelas tujuan sudah benar sebelum melakukan proses.
                </p>
            </div>

            {{-- FORM FILTER DAN AKSI --}}
            <div class="border-b pb-4 mb-6 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Pilih Kelas</h2>
                <form class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                    {{-- Kelas Asal --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kelas Asal</label>
                        <select class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Kelas Asal --</option>
                            <option value="VII A">VII A</option>
                            <option value="VIII A">VIII A</option>
                            <option value="IX A">IX A</option>
                        </select>
                    </div>
                    {{-- Kelas Tujuan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kelas Tujuan</label>
                        <select class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Pilih Kelas Tujuan --</option>
                            <option value="VIII A">VIII A</option>
                            <option value="IX A">IX A</option>
                            <option value="LULUS">Lulus</option>
                        </select>
                    </div>
                    {{-- Tombol Tampilkan Data --}}
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md text-sm w-full transition duration-150">
                            🔍 Tampilkan Data
                        </button>
                    </div>
                </form>
            </div>

            {{-- TABEL DATA SISWA --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Data Siswa Kelas Asal</h2>

                <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400 w-10">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Kelas Saat Ini</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">20250123</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Siti Aisyah</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">VII A</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{-- Style Kuning (Mirip style Dicicil/Peringatan) --}}
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-200">Belum Naik</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">
                                    <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">20250124</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Budi Santoso</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">VII A</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{-- Style Hijau (Mirip style Aktif/Lunas) --}}
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Naik</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- TOMBOL AKSI (Proses & Batalkan) --}}
                <div class="flex justify-end gap-3 mt-6">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-md text-sm transition duration-150">
                        ⬆ Proses Kenaikan
                    </button>
                    <button class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-md text-sm transition duration-150">
                        ⬇ Batalkan Kenaikan
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection