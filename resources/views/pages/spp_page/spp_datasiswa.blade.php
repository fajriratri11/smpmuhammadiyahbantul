@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Data Siswa
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- BAGIAN ATAS: FILTER & TOMBOL --}}
            <div class="flex flex-wrap justify-between items-center mb-6 border-b pb-4 border-gray-200 dark:border-gray-600">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Daftar Siswa</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Kelola data siswa aktif dan status pembayaran mereka.</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 text-sm">
                        + Tambah Siswa
                    </button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">
                        Import Excel
                    </button>
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 text-sm dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500">
                        Export Data
                    </button>
                </div>
            </div>

            {{-- FILTER KELAS --}}
            <form class="flex flex-wrap gap-4 mb-6">
                <select class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    <option value="">Semua Kelas</option>
                    <option value="VII A">VII A</option>
                    <option value="VII B">VII B</option>
                    <option value="VIII A">VIII A</option>
                    <option value="IX C">IX C</option>
                </select>
                <input type="text" placeholder="Cari nama siswa..." 
                       class="rounded-md border-gray-300 shadow-sm sm:text-sm p-2 flex-1 dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                <button type="submit" 
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 text-sm">
                        Cari
                </button>
            </form>

            {{-- TABEL DATA SISWA --}}
            <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">NIS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Nama Siswa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">22001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Siti Aisyah</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">VIII B</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Perempuan</td>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">22002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Budi Santoso</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">VII A</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Laki-laki</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded dark:bg-yellow-700 dark:text-yellow-200">Nonaktif</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-blue-600 hover:underline dark:text-blue-400">Edit</button>
                                <button class="text-red-600 hover:underline ml-3 dark:text-red-400">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="mt-6 flex justify-end">
                <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 border border-gray-300 text-sm text-gray-500 rounded-l-md hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600 dark:text-gray-300">Sebelumnya</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 text-sm text-gray-700 bg-gray-100 dark:border-gray-600 dark:bg-gray-600 dark:text-white">1</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 text-sm text-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600 dark:text-gray-300">2</a>
                    <a href="#" class="px-3 py-2 border border-gray-300 text-sm text-gray-500 rounded-r-md hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-600 dark:text-gray-300">Berikutnya</a>
                </nav>
            </div>

        </div>
    </div>
</main>
@endsection
