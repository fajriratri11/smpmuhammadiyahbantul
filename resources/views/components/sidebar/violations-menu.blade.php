{{-- Pastikan file ini di-include di dalam tag <ul> utama pada file sidebar utama Anda, seperti resources/views/components/sidebar/admin-sidebar.blade.php --}}

<li class="mt-4">
    <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-violations" data-collapse-toggle="dropdown-violations">
        {{-- Icon untuk Pelanggaran (Ganti dengan icon yang sesuai di library yang Anda gunakan) --}}
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1H7zM7 8a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1V9a1 1 0 00-1-1H7zM7 13a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1v-1a1 1 0 00-1-1H7zM14 4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1V4zM14 9a1 1 0 00-1-1h-2a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1V9zM14 14a1 1 0 00-1-1h-2a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1v-1z"></path></svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap font-semibold">Manajemen Pelanggaran</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
    <ul id="dropdown-violations" class="hidden py-2 space-y-2">
        <li>
            {{-- Ganti '#' dengan route yang sesuai, misalnya: {{ route('violations.record') }} --}}
            <a href="{{ route('violations.record') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pencatatan Pelanggaran</a>
        </li>
        <li>
            {{-- Ganti '#' dengan route yang sesuai, misalnya: {{ route('violations.recap') }} --}}
            <a href="{{ route('violations.recap') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Rekap Pelanggaran</a>
        </li>
    </ul>
</li>