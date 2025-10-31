@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Dashboard
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- FILTER TAHUN AJARAN DAN BULAN --}}
            <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-gray-100">Filter Pembayaran</h2>
                <form class="flex flex-wrap items-center gap-4">
                    <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Pilih Bulan</option>
                        <option value="10" selected>Oktober 2025</option>
                        <option value="09">September 2025</option>
                    </select>
                    <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">Tahun Ajaran</option>
                        <option selected>2025/2026</option>
                        <option>2024/2025</option>
                    </select>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">Tampilkan Data</button>
                    <button type="button" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">Cetak Laporan</button>
                </form>
            </div>

            {{-- CARD RINGKASAN SPP --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-green-50 p-5 rounded-lg shadow-md border-l-4 border-green-500 dark:bg-gray-800 dark:border-green-600">
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Total Pembayaran Masuk</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">Rp 52.300.000</p>
                </div>
                <div class="bg-yellow-50 p-5 rounded-lg shadow-md border-l-4 border-yellow-500 dark:bg-gray-800 dark:border-yellow-600">
                    <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Total Tagihan Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">Rp 60.000.000</p>
                </div>
                <div class="bg-blue-50 p-5 rounded-lg shadow-md border-l-4 border-blue-500 dark:bg-gray-800 dark:border-blue-600">
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Siswa Sudah Bayar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">220 Siswa</p>
                </div>
                <div class="bg-red-50 p-5 rounded-lg shadow-md border-l-4 border-red-500 dark:bg-gray-800 dark:border-red-600">
                    <p class="text-sm font-medium text-red-600 dark:text-red-400">Belum Bayar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">30 Siswa</p>
                </div>
            </div>

            {{-- CHART & PROGRESS BAR --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                {{-- CHART PENDAPATAN SPP PERBULAN --}}
                <div class="lg:col-span-2 bg-white p-5 rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Pendapatan SPP Per Bulan (2025/2026)</h2>
                    {{-- Simulasi Bar Chart (gunakan library chart sungguhan seperti Chart.js untuk implementasi nyata) --}}
                    <div class="h-64 flex items-end space-x-4 border-l border-b border-gray-200 dark:border-gray-600 pr-2 pt-2">
                        @php
                            $dataBulan = [
                                ['label' => 'Jul', 'value' => 45, 'color' => 'bg-blue-500'],
                                ['label' => 'Agu', 'value' => 60, 'color' => 'bg-blue-500'],
                                ['label' => 'Sep', 'value' => 85, 'color' => 'bg-blue-500'],
                                ['label' => 'Okt', 'value' => 90, 'color' => 'bg-green-500'], // Bulan terpilih
                                ['label' => 'Nov', 'value' => 40, 'color' => 'bg-gray-400'],
                                ['label' => 'Des', 'value' => 50, 'color' => 'bg-gray-400'],
                                ['label' => 'Jan', 'value' => 0, 'color' => 'bg-gray-400'],
                            ];
                        @endphp
                        
                        {{-- Bar chart area --}}
                        <div class="flex flex-1 items-end h-full">
                            @foreach($dataBulan as $bulan)
                            <div class="flex flex-col items-center justify-end h-full flex-1 mx-1 group cursor-pointer">
                                {{-- Bar --}}
                                <div style="height: {{ $bulan['value'] }}%;" 
                                    class="w-4 rounded-t {{ $bulan['color'] }} transition-all duration-300 ease-in-out hover:opacity-80 relative">
                                    {{-- Tooltip (contoh) --}}
                                    <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-1 px-2 py-0.5 text-xs font-semibold text-white bg-gray-800 dark:bg-gray-600 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                        {{ $bulan['value'] != 0 ? 'Rp ' . number_format($bulan['value'] * 600000 / 100, 0, ',', '.') : 'Belum Ada' }}
                                    </span>
                                </div>
                                {{-- Label --}}
                                <span class="mt-2 text-xs font-medium text-gray-500 dark:text-gray-400">{{ $bulan['label'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-xs text-gray-500 text-right mt-1 dark:text-gray-400">Tinggi Bar dihitung berdasarkan persentase pembayaran tertinggi.</div>
                </div>

                {{-- STATUS PEMBAYARAN BULAN INI (PROGRESS BAR) --}}
                <div class="lg:col-span-1 bg-white p-5 rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Status Pembayaran Bulan Ini (Oktober)</h2>

                    @php
                        $totalSiswa = 250;
                        $siswaLunas = 220;
                        $siswaMenunggu = 10; // Variabel ini sekarang digunakan untuk status "Dicicil"
                        $siswaBelumBayar = 30;

                        $persenLunas = round(($siswaLunas / $totalSiswa) * 100);
                        $persenMenunggu = round(($siswaMenunggu / $totalSiswa) * 100);
                        $persenBelumBayar = round(($siswaBelumBayar / $totalSiswa) * 100);
                        $persenTotalBayar = $persenLunas + $persenMenunggu;
                    @endphp

                    <div class="mb-5">
                        <div class="flex justify-between mb-1">
                            <span class="text-base font-medium text-green-700 dark:text-green-400">Total Pembayaran Masuk</span>
                            <span class="text-sm font-medium text-green-700 dark:text-green-400">{{ $persenTotalBayar }}%</span>
                        </div>
                        {{-- Progress Bar Total --}}
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-green-600 h-2.5 rounded-full transition-all duration-500" style="width: {{ $persenTotalBayar }}%"></div>
                        </div>
                    </div>
                    
                    {{-- Detail Status --}}
                    <div class="space-y-4">
                        <div class="p-3 bg-green-50 rounded-md dark:bg-gray-700 dark:border dark:border-green-600">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-green-600 dark:text-green-400">Lunas ({{ $siswaLunas }} Siswa)</span>
                                <span class="text-xs font-medium text-green-600 dark:text-green-400">{{ $persenLunas }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600">
                                <div class="bg-green-500 h-1.5 rounded-full" style="width: {{ $persenLunas }}%"></div>
                            </div>
                        </div>

                        <div class="p-3 bg-yellow-50 rounded-md dark:bg-gray-700 dark:border dark:border-yellow-600">
                            <div class="flex justify-between mb-1">
                                {{-- PERUBAHAN LABEL DI SINI --}}
                                <span class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Dicicil ({{ $siswaMenunggu }} Siswa)</span>
                                <span class="text-xs font-medium text-yellow-600 dark:text-yellow-400">{{ $persenMenunggu }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600">
                                <div class="bg-yellow-500 h-1.5 rounded-full" style="width: {{ $persenMenunggu }}%"></div>
                            </div>
                        </div>

                        <div class="p-3 bg-red-50 rounded-md dark:bg-gray-700 dark:border dark:border-red-600">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-red-600 dark:text-red-400">Belum Bayar ({{ $siswaBelumBayar }} Siswa)</span>
                                <span class="text-xs font-medium text-red-600 dark:text-red-400">{{ $persenBelumBayar }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-600">
                                <div class="bg-red-500 h-1.5 rounded-full" style="width: {{ $persenBelumBayar }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            ---

            {{-- TABEL TRANSAKSI TERBARU --}}
            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Transaksi Terbaru</h2>
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Bulan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jumlah Bayar</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Siti Aisyah</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">VIII B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Oktober</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp 250.000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Lunas</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-200">25 Okt 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Budi Santoso</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">VII A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Oktober</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp 250.000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                {{-- PERUBAHAN LABEL DI SINI --}}
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-200">Dicicil</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-200">26 Okt 2025</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rina Dewi</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">IX C</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Oktober</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp 250.000</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded dark:bg-red-700 dark:text-red-200">Belum Bayar</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-200">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
@endsection