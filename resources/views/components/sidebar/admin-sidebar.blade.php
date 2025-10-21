{{-- Edit file yang berisi susunan menu Anda --}}

<x-sidebar-dashboard>
    
    {{-- BARIS INI KEMUNGKINAN MASIH ADA DAN HARUS DIHAPUS JIKA SUDAH DIPINDAHKAN KE DROPDOWN --}}
    {{-- JIKA INI ADA, UBAH SEPERTI DI BAWAH: --}}
   
    
    
    {{-- INI ADALAH DROPDOWN MANAJEMEN PRESENSI --}}
    <x-sidebar-menu-dropdown-dashboard routeName="attendance.*" title="Manajemen Presensi"> 
        <x-sidebar-menu-dropdown-item-dashboard routeName="attendance.record" title="Pencatatan Harian" />
        {{-- PASTIKAN BARIS INI MENGGUNAKAN NAMA ROUTE BARU YANG SUDAH DIDEFINISIKAN --}}
        <x-sidebar-menu-dropdown-item-dashboard routeName="attendance.recap" title="Rekap Presensi" /> 
    </x-sidebar-menu-dropdown-dashboard>

    {{-- MENU MANAJEMEN PELANGGARAN --}}
    <x-sidebar-menu-dropdown-dashboard routeName="violations.*" title="Manajemen Pelanggaran"> 
        <x-sidebar-menu-dropdown-item-dashboard routeName="violations.record" title="Pencatatan Pelanggaran" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="violations.recap" title="Rekap Pelanggaran" />
    </x-sidebar-menu-dropdown-dashboard>
    
</x-sidebar-dashboard>