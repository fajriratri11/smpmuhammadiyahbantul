@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Manajemen Kelas
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- HEADER + TOMBOL TAMBAH --}}
            <div class="flex flex-wrap justify-between items-center mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Kelas</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Kelola data kelas, wali kelas, dan jumlah siswa aktif.</p>
                </div>
                <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">
                    + Tambah Kelas
                </button>
            </div>

            {{-- FILTER TAHUN AJARAN --}}
            <form class="flex flex-wrap gap-4 mb-6">
                <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <option value="">Pilih Tahun Ajaran</option>
                    <option value="2025/2026">2025 / 2026</option>
                    <option value="2024/2025">2024 / 2025</option>
                </select>
                <input type="text" placeholder="Cari nama kelas..." 
                       class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 flex-1 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <button type="submit" 
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">
                        Cari
                </button>
            </form>

            {{-- TABEL DATA KELAS --}}
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Wali Kelas</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jumlah Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tahun Ajaran</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">VII A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Ibu Siti Rahma</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">30</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2025 / 2026</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">VIII B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Bapak Ahmad Junaidi</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">28</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2025 / 2026</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">IX C</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Ibu Rina Putri</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-900 dark:text-gray-200">32</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2024 / 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- CATATAN --}}
            <div class="mt-6 bg-blue-50 dark:bg-blue-900 p-4 rounded-lg border-l-4 border-blue-500">
                <p class="text-sm text-blue-800 dark:text-blue-200">
                    ℹ️ Pastikan setiap kelas memiliki wali kelas dan terhubung dengan tahun ajaran aktif.
                </p>
            </div>

        </div>
    </div>
</main>
@endsection
