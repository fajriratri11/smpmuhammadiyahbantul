@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Manajemen Tahun Ajaran
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- HEADER + TOMBOL TAMBAH --}}
            <div class="flex flex-wrap justify-between items-center mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Tahun Ajaran</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Kelola periode tahun ajaran dan status aktif untuk sistem pembayaran.</p>
                </div>
                <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">
                    + Tambah Tahun Ajaran
                </button>
            </div>

            {{-- TABEL TAHUN AJARAN --}}
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tahun Ajaran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tanggal Mulai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tanggal Selesai</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">2025 / 2026</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">15 Juli 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">10 Juni 2026</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Aktif</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">2024 / 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">17 Juli 2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">10 Juni 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded dark:bg-gray-600 dark:text-gray-200">Nonaktif</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- CATATAN / INFO --}}
            <div class="mt-6 bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-400">
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    ⚠️ Hanya satu tahun ajaran yang dapat berstatus <strong>Aktif</strong> dalam satu waktu.
                </p>
            </div>

        </div>
    </div>
</main>
@endsection
