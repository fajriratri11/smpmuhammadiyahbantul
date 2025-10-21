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
        {{-- CONTAINER UTAMA --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">
            
            <form class="mb-6 pb-4 border-b border-gray-200 dark:border-gray-600" action="#" method="GET">
                <h2 class="text-lg font-semibold text-gray-800 mb-3 dark:text-white">Pilih Kelas dan Tanggal</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    
                    {{-- Pilih Tanggal --}}
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal</label>
                        <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" 
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
                            <option value="X-A">X - A</option>
                            <option value="X-B">X - B</option>
                            <option value="XI-A">XI - A</option>
                        </select>
                    </div>

                    {{-- Tombol Tampilkan --}}
                    <div>
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Tampilkan Siswa
                        </button>
                    </div>
                </div>
            </form>

            <form action="#" method="POST">
                @csrf
                <h3 class="text-xl font-semibold text-gray-900 mb-4 dark:text-white">Daftar Siswa Kelas X - B (18 Oktober 2025)</h3>
                
                <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                {{-- Kolom disesuaikan agar konsisten dengan Rekap Presensi --}}
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400 w-1/4">Status Kehadiran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Keterangan (Opsional)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                            
                            {{-- Baris Siswa 1 --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">12345</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Agus Santoso</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <select name="status[12345]" required class="w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                        <option value="H">Hadir</option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alfa (Tanpa Keterangan)</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <input type="text" name="notes[12345]" placeholder="Alasan (jika S, I, A)" class="w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                </td>
                            </tr>
                            
                            {{-- Baris Siswa 2 --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">67890</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Siti Rahmawati</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <select name="status[67890]" required class="w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                        <option value="H">Hadir</option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alfa (Tanpa Keterangan)</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <input type="text" name="notes[67890]" placeholder="Alasan (jika S, I, A)" class="w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-1.5 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                                </td>
                            </tr>
                            
                            {{-- ... siswa lainnya --}}

                        </tbody>
                    </table>
                </div>

                {{-- Tombol Simpan --}}
                <div class="pt-5 flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Simpan Presensi
                    </button>
                </div>

            </form>
            
        </div>
    </div>
</main>
@endsection