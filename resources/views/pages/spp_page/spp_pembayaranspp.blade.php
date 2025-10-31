@extends('layouts.spp-dashboard')

@section('content')
{{-- HEADER Halaman --}}

<header class="bg-white shadow dark:bg-gray-800">
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
<h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
Data Tunggakan SPP per Kelas
</h1>
</div>
</header>

<main>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
{{-- Konten Utama berada di dalam shadow box besar --}}
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

        {{-- ALERT INFO --}}
       <div class="mt-6 bg-purple-50 dark:bg-purple-900 p-4 rounded-lg border-l-4 border-purple-400">
            <p class="text-sm text-purple-800 dark:text-purple-200">
                📊 Halaman ini menyajikan ringkasan total tunggakan SPP yang belum terbayar untuk setiap kelas.
            </p>
        </div>

        {{-- FORM FILTER DATA (Tahun Ajaran & Kelas) --}}
        <div class="border-b pb-4 mb-6 border-gray-200 dark:border-gray-600 py-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Filter Data & Aksi</h2>
            <form class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                {{-- Tahun Ajaran --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tahun Ajaran</label>
                    <select class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Tahun Ajaran --</option>
                        <option selected>2025/2026</option>
                        <option>2024/2025</option>
                        <option>2023/2024</option>
                    </select>
                </div>

                {{-- Kelas (Opsional, untuk memfilter lebih spesifik) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kelas</label>
                    <select class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Semua Kelas --</option>
                        <option>VII A</option>
                        <option>VIII A</option>
                        <option>IX B</option>
                    </select>
                </div>

                {{-- Tombol Aksi (Tampilkan Data & Tambah Pembayaran) --}}
                <div class="flex items-end md:col-span-2 space-x-3">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md text-sm transition duration-150 flex-shrink-0">
                        ▶️ Tampilkan Data
                    </button>

                </div>
            </form>
        </div>

        {{-- TABEL DATA TUNGGAKAN PER KELAS --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Ringkasan Tunggakan Tahun Ajaran 2025/2026</h2>
            
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Kelas</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total Tunggakan</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        
                        {{-- Contoh Data 1: Tunggakan Tinggi --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">VIII A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-red-600 dark:text-red-400 text-right">
                                Rp45.750.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                   <a href="#" 
                                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail Siswa
                                    </a>
                            </td>
                        </tr>
                        
                        {{-- Contoh Data 2: Tunggakan Sedang --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">IX B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-yellow-600 dark:text-yellow-400 text-right">
                                Rp15.000.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                   <a href="#" 
                                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail Siswa
                                    </a>
                            </td>
                        </tr>

                        {{-- Contoh Data 3: Tunggakan Rendah --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">VII C</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-200 text-right">
                                Rp1.500.000
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                   <a href="#" 
                                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail Siswa
                                    </a>
                            </td>
                        </tr>

                        {{-- Contoh Data 4: Lunas --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">X A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600 dark:text-green-400 text-right">
                                Rp0
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                   <a href="{{ route('spp_page.spp_detail_kelas_spp') }}" 
                                        class="bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail Siswa
                                    </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- TOTAL KESELURUHAN TUNGGAKAN --}}
            <div class="flex justify-end mt-4">
                <div class="bg-red-600 dark:bg-red-500 text-white px-4 py-2 rounded-md text-base font-bold">
                    💰 Total Tunggakan Keseluruhan: Rp62.250.000
                </div>
            </div>
        </div>
        
    </div>
</div>


</main>
@endsection