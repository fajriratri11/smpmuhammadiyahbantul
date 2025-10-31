@extends('layouts.spp-dashboard')

@section('content')
{{-- HEADER Halaman --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Detail Tunggakan Kelas VIII A
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Konten Utama berada di dalam shadow box besar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- INFORMASI RINGKASAN KELAS --}}
            <div class="bg-indigo-100 dark:bg-indigo-800 border-l-4 border-indigo-500 text-indigo-900 dark:text-indigo-100 p-4 mb-6 rounded-md">
                <p class="font-bold text-lg">Kelas: VIII A (Tahun Ajaran 2025/2026)</p>
                <p class="text-sm">Total Siswa: 30 | **Total Tunggakan Kelas: Rp45.750.000**</p>
                {{-- Tombol kembali ke halaman ringkasan kelas --}}
                <div class="mt-2">
                    <a href="{{ route('spp_page.spp_pembayaranspp') }}" class="text-sm font-semibold text-indigo-700 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-100">
                        ← Kembali ke Ringkasan Kelas
                    </a>
                </div>
            </div>

            ---

            {{-- FORM FILTER PENCARIAN SISWA --}}
            <div class="border-b pb-4 mb-6 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Cari Siswa</h2>
                <form class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    {{-- Cari Nama / NIS --}}
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama / NIS Siswa</label>
                        <input type="text" placeholder="Masukkan Nama atau NIS siswa..." 
                            class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Tombol Cari --}}
                    <div class="flex items-end">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md text-sm w-full transition duration-150">
                            🔍 Cari
                        </button>
                    </div>
                </form>
            </div>

            ---

            {{-- TABEL RINCIAN TUNGGAKAN SISWA --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Daftar Siswa Kelas VIII A dengan Tunggakan</h2>
                <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jml Bulan Tunggakan</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total Tunggakan</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                            
                            {{-- Contoh Data 1: Tunggakan Penuh --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">20250123</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Siti Aisyah</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">11 Bulan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-red-600 dark:text-red-400 text-right">
                                    Rp1.600.000
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                     <a href="{{ route('spp_page.spp_detail_pembayaran_siswa') }}" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            
                            {{-- Contoh Data 2: Tunggakan Sebagian --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">20250124</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Budi Santoso</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">3 Bulan (Dicicil)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-yellow-600 dark:text-yellow-400 text-right">
                                    Rp450.000
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                     <a href="#" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Lihat Detail                                    </a>
                                </td>
                            </tr>

                            {{-- Contoh Data 3: Tunggakan Rendah --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">20250125</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Dewi Lestari</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1 Bulan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-200 text-right">
                                    Rp150.000
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                     <a href="#" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        lihat detail
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection