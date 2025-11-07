@extends('layouts.dashboard')

@section('content')
@php
    $namaBulan = [
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    ];
    $bulanSekarang = request('bulan', date('n')); 
    $kelasSekarang = request('kelas');
@endphp

<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Rekap Presensi Siswa
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- FILTER --}}
            <div class="mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-gray-100">Filter Presensi</h2>

                {{-- Form Filter --}}
                <form method="GET" action="{{ route('presensi.recap') }}" class="flex flex-wrap items-center gap-4">
                    {{-- Filter Bulan --}}
                    <select name="bulan" id="bulan" 
                        class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        @foreach ($namaBulan as $angka => $nama)
                            <option value="{{ $angka }}" {{ $bulanSekarang == $angka ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Filter Kelas --}}
                    <select name="kelas" id="kelas"
                        class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 w-full md:w-auto dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <option value="">-- Semua Kelas --</option>
                        @foreach (['7A','7B','7C','7D','8A','8B','8C','8D','9A','9B','9C','9D'] as $k)
                            <option value="{{ $k }}" {{ $kelasSekarang == $k ? 'selected' : '' }}>
                                {{ $k }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Tombol Filter & Cetak --}}
                    <button type="submit" 
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">
                        Tampilkan Data
                    </button>

                    <button type="button" 
                        class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                        Cetak Rekap
                    </button>
                </form>

                {{-- Tombol Import Excel (form terpisah) --}}
                <form action="{{ route('siswas.import') }}" method="POST" enctype="multipart/form-data" id="importForm" class="mt-3">
                    @csrf
                    <input type="file" name="file" accept=".xls,.xlsx" id="importFile" class="hidden"
                        onchange="document.getElementById('importForm').submit();">
                    <button type="button"
                        onclick="document.getElementById('importFile').click();"
                        class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 text-sm">
                        Import Excel
                    </button>
                </form>
            </div>

            {{-- PESAN BERHASIL/GAGAL UPLOAD --}}
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            {{-- SUMMARY --}}
            @php
                $totalHadir = collect($rekap)->sum('hadir');
                $totalSakit = collect($rekap)->sum('sakit');
                $totalIzin  = collect($rekap)->sum('izin');
                $totalAlfa  = collect($rekap)->sum('alfa');
                $totalSemua = $totalHadir + $totalSakit + $totalIzin + $totalAlfa;
                $persentaseHadir = $totalSemua > 0 ? round(($totalHadir / $totalSemua) * 100, 1) : 0;
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-green-50 p-5 rounded-lg shadow-md border-l-4 border-green-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-green-600 dark:text-green-400">Total Kehadiran</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $persentaseHadir }}%</p>
                </div>

                <div class="bg-yellow-50 p-5 rounded-lg shadow-md border-l-4 border-yellow-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Total Sakit (S)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalSakit }} Kasus</p>
                </div>

                <div class="bg-blue-50 p-5 rounded-lg shadow-md border-l-4 border-blue-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Izin (I)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalIzin }} Kasus</p>
                </div>

                <div class="bg-red-50 p-5 rounded-lg shadow-md border-l-4 border-red-500 dark:bg-gray-800">
                    <p class="text-sm font-medium text-red-600 dark:text-red-400">Total Tanpa Keterangan (A)</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalAlfa }} Kasus</p>
                </div>
            </div>

            {{-- JUDUL TABEL --}}
            <h2 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">
                Rekapitulasi Presensi {{ $kelasSekarang ? 'Kelas ' . $kelasSekarang : 'Semua Kelas' }} ({{ $namaBulan[$bulanSekarang] }})
            </h2>

            {{-- TABEL --}}
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                @if (isset($rekap) && count($rekap) > 0)
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
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
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                            @foreach ($rekap as $data)
                                @php
                                    $totalHari = $data->hadir + $data->sakit + $data->izin + $data->alfa;
                                    $persentase = ($totalHari > 0) ? ($data->hadir / $totalHari) * 100 : 0;
                                @endphp
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $data->nis ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $data->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-green-600 dark:text-green-400">{{ $data->hadir }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-yellow-600 dark:text-yellow-400">{{ $data->sakit }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-blue-600 dark:text-blue-400">{{ $data->izin }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-red-600 dark:text-red-400">{{ $data->alfa }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center dark:text-gray-200">{{ $totalHari }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-semibold dark:text-gray-200">{{ number_format($persentase, 0) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center py-6 text-gray-600 dark:text-gray-300">
                        Tidak ada data presensi untuk bulan dan kelas yang dipilih.
                    </p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
