<x-sidebar-dashboard>
    
    {{-- INI ADALAH MENU DASHBOARD BIASA --}}
    <x-sidebar-spp-menu-item routeName="spp_page.spp_dashboard" title="Dashboard" />
    <x-sidebar-spp-menu-item routeName="spp_page.spp_pembayaranspp" title="Pembayaran SPP" />
    <x-sidebar-spp-menu-item routeName="spp_page.spp_notifikasi_tunggakan_wa" title="Kirim Tagihan" />
    
    <x-sidebar-spp-menu-dropdown routeName="spp_page*" title="Manajemen Data">
        <x-sidebar-spp-menu-dropdown-item routeName="spp_page.spp_tahunajaran" title="Tahun Ajaran" />
        <x-sidebar-spp-menu-dropdown-item routeName="spp_page.spp_kelas" title="Kelas" />
        <x-sidebar-spp-menu-dropdown-item routeName="spp_page.spp_datasiswa" title="Siswa" />
        <x-sidebar-spp-menu-dropdown-item routeName="spp_page.spp_kenaikankelas" title="Kenaikan Kelas" />
        <x-sidebar-spp-menu-dropdown-item routeName="spp_page.spp_kelulusansiswa" title="Kelulusan Siswa" />
    </x-sidebar-menu-dropdown-dashboard>
    


</x-sidebar-dashboard>