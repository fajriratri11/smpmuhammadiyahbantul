@extends('layouts.dashboard')

@section('content')
{{-- HEADER --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Pencatatan Pelanggaran Siswa
        </h1>
    </div>
</header>

<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- CONTAINER UTAMA --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">
            
            <form action="#" method="POST">
                @csrf
                
                {{-- BAGIAN FORM DUA KOLOM (SESUAI GAMBAR) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- FIELD 1: NIS Siswa --}}
                    <div>
                        <label for="student_nis" class="block text-sm font-medium text-gray-700 dark:text-gray-200">NIS Siswa</label>
                        <input type="text" name="student_nis" id="student_nis" autocomplete="off" placeholder="Cari NIS atau Nama Siswa" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 
                                      dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ketik NIS dan sistem akan menampilkan nama siswa secara otomatis.</p>
                    </div>
                    
                    {{-- FIELD 2: Nama Siswa --}}
                    <div>
                        <label for="student_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Siswa</label>
                        <input type="text" name="student_name" id="student_name" value="Nama Siswa Otomatis" disabled 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-gray-100 
                                      dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                    </div>
                    
                    {{-- FIELD 3: Jenis Pelanggaran --}}
                    <div>
                        <label for="violation_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Jenis Pelanggaran</label>
                        <select id="violation_type" name="violation_type" 
                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm 
                                       dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                            <option value="">Pilih Jenis Pelanggaran</option>
                            <option value="ringan">Ringan (Poin: 5)</option>
                            <option value="sedang">Sedang (Poin: 15)</option>
                            <option value="berat">Berat (Poin: 30)</option>
                        </select>
                    </div>
                    
                    {{-- FIELD 4: Tanggal Pelanggaran --}}
                    <div>
                        <label for="violation_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal Pelanggaran</label>
                        <input type="date" name="violation_date" id="violation_date" value="{{ date('Y-m-d') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 
                                      dark:bg-gray-800 dark:border-gray-600 dark:text-white">
                    </div>
                </div>

                {{-- FIELD 5: Deskripsi Pelanggaran (FULL WIDTH) --}}
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi Pelanggaran</label>
                    <textarea id="description" name="description" rows="3" placeholder="Jelaskan secara rinci pelanggaran yang dilakukan..." 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 
                                     dark:bg-gray-800 dark:border-gray-600 dark:text-white"></textarea>
                </div>

                {{-- FIELD 6: Pelapor (READ ONLY) --}}
                <div class="mt-6">
                    <label for="reporter" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Pelapor / Pihak yang Mencatat</label>
                    <input type="text" name="reporter" id="reporter" value="{{ Auth::user()->name ?? 'Nama Petugas' }}" disabled 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm p-2 bg-gray-100 
                                  dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                </div>

                {{-- TOMBOL SUBMIT --}}
                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Catat Pelanggaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection