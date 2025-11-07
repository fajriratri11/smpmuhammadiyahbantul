@extends('layouts.dashboard')

@section('content')
{{-- HEADER --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Pencatatan Presensi Harian
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-100 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        ✅
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- CONTAINER UTAMA --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">
            
            {{-- FORM FILTER --}}
            <form class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-600" action="{{ route('presensi.record') }}" method="GET">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-white">Pilih Kelas dan Tanggal</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    
                    {{-- Pilih Tanggal --}}
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal</label>
                        <input type="date" name="date" id="date" value="{{ $tanggal ?? date('Y-m-d') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 
                                      dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                    
                    {{-- Pilih Kelas --}}
                    <div>
                        <label for="class" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Kelas</label>
                        <select id="class" name="class" 
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm sm:text-sm 
                                       dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach (['7A','7B','7C','7D','8A','8B','8C','8D','9A','9B','9C','9D'] as $k)
                                <option value="{{ $k }}" {{ request('class') == $k ? 'selected' : '' }}>Kelas {{ $k }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tombol Tampilkan --}}
                    <div>
                        <button type="submit" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Tampilkan Siswa
                        </button>
                    </div>
                </div>
            </form>

            {{-- FORM INPUT PRESENSI --}}
            @if (!empty($siswas) && count($siswas) > 0)
                <form action="{{ route('presensi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tanggal" value="{{ $tanggal }}">
                    <input type="hidden" name="kelas" value="{{ $kelas }}">

                    <h3 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">
                        Daftar Siswa Kelas {{ $kelas ?? '-' }} ({{ $tanggal }})
                    </h3>

                    <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status Kehadiran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">{{ $siswa->nis }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">{{ $siswa->nama }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <select name="status[{{ $siswa->id }}]" required 
                                                class="w-full rounded-md border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Alfa">Alfa</option>
                                            </select>
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <input type="text" name="notes[{{ $siswa->id }}]" 
                                                placeholder="Alasan (jika S/I/A)" 
                                                class="w-full rounded-md border-gray-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-5 flex justify-end">
                        <button type="submit" 
                            class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700">
                            Simpan Presensi
                        </button>
                    </div>
                </form>
            @elseif($kelas)
                <p class="text-gray-500 dark:text-gray-300 mt-4">Tidak ada siswa ditemukan untuk kelas {{ $kelas }}.</p>
            @endif
            
        </div>
    </div>
</main>
@endsection
