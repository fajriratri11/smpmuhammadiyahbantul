@extends('layouts.spp-dashboard')

@section('content')
{{-- ... (Kode Header, Data Siswa, dan Tabel Tagihan TETAP SAMA) ... --}}
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            Input Pembayaran SPP Siswa
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Konten Utama berada di dalam shadow box besar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            {{-- ALERT INFO --}}
            <div class="mt-6 bg-blue-50 dark:bg-blue-900 p-4 rounded-lg border-l-4 border-blue-400">
                <p class="text-sm text-blue-800 dark:text-blue-200">
                    💡 Halaman ini digunakan untuk mencatat pembayaran SPP siswa.
                </p>
            </div>


            {{-- INFORMASI DATA SISWA --}}
            <div class="border-b pb-4 mb-6 border-gray-200 dark:border-gray-600 py-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Informasi Data Siswa</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                    <div>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">NIS:</span> 20250123</p>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">Nama:</span> Siti Aisyah</p>
                    </div>
                    <div>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">Kelas:</span> VIII A</p>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">Tahun Ajaran:</span> 2025/2026</p>
                    </div>
                    <div>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">Total Tagihan per Bulan:</span> Rp150.000</p>
                        <p><span class="font-semibold text-gray-800 dark:text-gray-300">Status Terakhir:</span> 
                            {{-- Menggunakan style badge Nonaktif (Merah) untuk Tunggakan --}}
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs font-semibold dark:bg-red-700 dark:text-red-200">Ada Tunggakan</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- STATUS TAGIHAN BULANAN --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Status Tagihan Bulanan</h2>
                <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg mb-6">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Bulan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total Tagihan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total Terbayar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Sisa Tagihan</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:divide-gray-600">
                            {{-- Contoh Lunas --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Januari</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp150.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp150.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp0</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded dark:bg-green-700 dark:text-green-200">Lunas</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                     <button 
                                        data-bulan="Januari" 
                                        data-status="lunas" 
                                        class="riwayat-button bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Riwayat
                                    </button>
                                </td>
                            </tr>
                            {{-- Contoh Dicicil --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">Februari</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp150.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp50.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp100.000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded dark:bg-blue-700 dark:text-blue-200">Dicicil</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center flex items-center justify-center space-x-2">
                                    <button data-bulan="Februari" data-sisa="100000" class="bayar-button bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Bayar
                                    </button>
                                     <button 
                                        data-bulan="Februari" 
                                        data-status="dicicil" 
                                        class="riwayat-button bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                        Riwayat
                                    </button>
                                </td>
                            </tr>
                            {{-- Contoh Belum Lunas --}}
                            @php
                                $months = ['Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp
                            @foreach ($months as $index => $month)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $index + 3 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $month }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp150.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp0</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">Rp150.000</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded dark:bg-red-700 dark:text-red-200">Belum Lunas</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center flex items-center justify-center space-x-2">
                                        <button data-bulan="{{ $month }}" data-sisa="150000" class="bayar-button bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                            Bayar
                                        </button>
                                         <button 
                                            data-bulan="{{ $month }}" 
                                            data-status="belum-lunas" 
                                            class="riwayat-button bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-semibold px-3 py-1 rounded transition">
                                            Riwayat
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- TOTAL TUNGGAKAN & Tombol Cetak --}}
                <div class="flex justify-between items-center mb-8">
                    <button class="bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded transition shadow-md">
                        Cetak Laporan Tagihan
                    </button>
                    <div class="bg-red-600 dark:bg-red-500 text-white px-4 py-2 rounded-md text-sm font-semibold shadow-lg">
                        ⚠️ <span class="font-bold">Total Tunggakan:</span> Rp1.600.000
                    </div>
                </div>
            </div>

            {{-- FORMULIR PEMBAYARAN --}}
            {{-- ... (Kode Form Pembayaran TETAP SAMA) ... --}}
            <div class="mt-8 border-t pt-6 border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-6">📝 Form Input Pembayaran</h2>
                
                <form action="#" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        {{-- Bulan yang Dibayar --}}
                        <div>
                            <label for="bulan_dibayar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Pilih Bulan yang Dibayar
                            </label>
                            <select id="bulan_dibayar" name="bulan_dibayar[]" multiple required
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-sm">
                                <option value="Februari">Februari (Sisa: Rp100.000)</option>
                                <option value="Maret">Maret (Sisa: Rp150.000)</option>
                                <option value="April">April (Sisa: Rp150.000)</option>
                                <option value="Mei">Mei (Sisa: Rp150.000)</option>
                                <option value="Juni">Juni (Sisa: Rp150.000)</option>
                                <option value="Juli">Juli (Sisa: Rp150.000)</option>
                                <option value="Agustus">Agustus (Sisa: Rp150.000)</option>
                                <option value="September">September (Sisa: Rp150.000)</option>
                                <option value="Oktober">Oktober (Sisa: Rp150.000)</option>
                                <option value="November">November (Sisa: Rp150.000)</option>
                                <option value="Desember">Desember (Sisa: Rp150.000)</option>
                            </select>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Tekan Ctrl/Cmd untuk memilih lebih dari satu bulan.</p>
                        </div>

                        {{-- Jumlah Pembayaran --}}
                        <div>
                            <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Jumlah Pembayaran (Rp)
                            </label>
                            <input type="number" id="jumlah_bayar" name="jumlah_bayar" required min="1" placeholder="Cth: 150000"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 rounded-md shadow-sm p-2">
                            <p class="mt-2 text-xs text-red-500">Pastikan jumlah yang dibayarkan sesuai dengan total tagihan bulan yang dipilih.</p>
                        </div>
                        
                        {{-- Tanggal Pembayaran --}}
                         <div>
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Tanggal Pembayaran
                            </label>
                            <input type="date" id="tanggal_bayar" name="tanggal_bayar" required value="{{ date('Y-m-d') }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 rounded-md shadow-sm p-2">
                        </div>

                        {{-- Metode Pembayaran (Opsional) --}}
                        <div>
                            <label for="metode_bayar" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Metode Pembayaran
                            </label>
                            <select id="metode_bayar" name="metode_bayar"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 rounded-md shadow-sm p-2 text-sm">
                                <option value="Tunai">Tunai</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                        </div>

                    </div>

                    {{-- Tombol Submit --}}
                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                            ✅ Catat Pembayaran
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</main>

{{-- Modal Container (Hidden by default) --}}
<div id="riwayatModal" class="fixed inset-0 bg-gray-600 bg-opacity-75 overflow-y-auto hidden z-50">
    <div class="flex items-center justify-center min-h-screen">
        {{-- Modal Content --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-2xl mx-4 my-8 transform transition-all duration-300 scale-100">
            
            {{-- Modal Header --}}
            <div class="flex justify-between items-center p-5 border-b dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Riwayat Transaksi Pembayaran Bulan: <span id="modalBulanTitle" class="text-indigo-600 dark:text-indigo-400"></span>
                </h3>
                <button type="button" id="closeModalButton" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            
            {{-- Modal Body --}}
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 text-sm font-semibold text-gray-700 dark:text-gray-300">
                    <p>Total Tagihan: <span id="modalTotalTagihan" class="font-bold text-gray-900 dark:text-white">Rp150.000</span></p>
                    <p>Status: <span id="modalStatus" class="font-bold text-red-600 dark:text-red-400">Belum Lunas</span></p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">No. Transaksi</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Tgl Bayar</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Jumlah Bayar</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Metode</th>
                            </tr>
                        </thead>
                        <tbody id="modalRiwayatTableBody" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            {{-- Data Riwayat akan diisi oleh JavaScript --}}
                        </tbody>
                        <tfoot class="bg-gray-100 dark:bg-gray-700">
                             <tr>
                                <td colspan="2" class="px-4 py-2 text-right text-sm font-bold text-gray-800 dark:text-gray-100">Total Terbayar:</td>
                                <td id="modalTotalTerbayar" class="px-4 py-2 text-right text-sm font-bold text-green-600 dark:text-green-400"></td>
                                <td colspan="1"></td> {{-- Penyesuaian colspan karena kolom Kasir dihapus --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            {{-- Modal Footer --}}
            <div class="p-5 border-t dark:border-gray-700 text-right">
                <button type="button" id="closeModalFooter" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg text-sm dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    Tutup
                </button>
                <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg text-sm ml-2">
                    Cetak Kuitansi
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const riwayatButtons = document.querySelectorAll('.riwayat-button');
        const modal = document.getElementById('riwayatModal');
        const closeModalButtons = document.querySelectorAll('#closeModalButton, #closeModalFooter');
        const modalTitle = document.getElementById('modalBulanTitle');
        const modalStatus = document.getElementById('modalStatus');
        const modalTableBody = document.getElementById('modalRiwayatTableBody');
        const modalTotalTerbayar = document.getElementById('modalTotalTerbayar');
        const formatter = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });

        // Data Simulasi Riwayat
        const mockRiwayatData = {
            'Januari': {
                status: 'Lunas',
                // Menghapus atribut 'kasir' dari data simulasi
                transaksi: [
                    { id: 'TRX-001', tgl: '2025-01-05', jumlah: 150000, metode: 'Tunai' },
                ]
            },
            'Februari': {
                status: 'Dicicil',
                transaksi: [
                    { id: 'TRX-002', tgl: '2025-02-10', jumlah: 50000, metode: 'Transfer' },
                ]
            },
            // Bulan lain tidak memiliki riwayat
        };

        // Fungsi untuk mengisi dan menampilkan modal
        const showRiwayatModal = (bulan, status) => {
            const data = mockRiwayatData[bulan] || { status: 'Belum Lunas', transaksi: [] };
            
            // 1. Isi Header Modal
            modalTitle.textContent = bulan;
            modalStatus.textContent = data.status;
            
            // Set warna status
            if (data.status === 'Lunas') {
                modalStatus.classList.replace('text-red-600', 'text-green-600');
            } else if (data.status === 'Dicicil') {
                 modalStatus.classList.remove('text-green-600', 'text-red-600');
                 modalStatus.classList.add('text-blue-600');
            } else {
                 modalStatus.classList.remove('text-green-600', 'text-blue-600');
                 modalStatus.classList.add('text-red-600');
            }
            
            // 2. Isi Body Tabel
            modalTableBody.innerHTML = '';
            let totalTerbayar = 0;

            if (data.transaksi.length > 0) {
                data.transaksi.forEach(transaksi => {
                    totalTerbayar += transaksi.jumlah;
                    const row = `
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-200">${transaksi.id}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-200">${transaksi.tgl}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-right text-green-600 font-medium dark:text-green-400">${formatter.format(transaksi.jumlah)}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-200">${transaksi.metode}</td>
                            {{-- Kolom Kasir Dihapus --}}
                        </tr>
                    `;
                    modalTableBody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                 const row = `
                        <tr>
                            <td colspan="4" class="px-4 py-4 whitespace-nowrap text-center text-gray-500 italic dark:text-gray-400">Belum ada riwayat pembayaran untuk bulan ini.</td>
                        </tr>
                    `;
                    modalTableBody.insertAdjacentHTML('beforeend', row);
            }
            
            // 3. Isi Footer Tabel
            modalTotalTerbayar.textContent = formatter.format(totalTerbayar);
            
            // 4. Tampilkan Modal
            modal.classList.remove('hidden');
        };

        // Event Listener untuk Tombol Riwayat
        riwayatButtons.forEach(button => {
            button.addEventListener('click', function() {
                const bulan = this.getAttribute('data-bulan');
                const status = this.getAttribute('data-status');
                showRiwayatModal(bulan, status);
            });
        });

        // Event Listener untuk Menutup Modal
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });

        // Tutup modal ketika klik di luar area modal
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
        
        // --- (Script untuk Tombol Bayar) ---
        const bayarButtons = document.querySelectorAll('.bayar-button');
        const bulanSelect = document.getElementById('bulan_dibayar');
        const jumlahBayarInput = document.getElementById('jumlah_bayar');

        bayarButtons.forEach(button => {
            button.addEventListener('click', function() {
                const bulan = this.getAttribute('data-bulan');
                const sisaTagihan = this.getAttribute('data-sisa');

                Array.from(bulanSelect.options).forEach(option => {
                    option.selected = false;
                });

                Array.from(bulanSelect.options).forEach(option => {
                    if (option.value === bulan) {
                        option.selected = true;
                    }
                });

                jumlahBayarInput.value = sisaTagihan;
                document.getElementById('bulan_dibayar').scrollIntoView({ behavior: 'smooth' });
                jumlahBayarInput.focus();
            });
        });
    });
</script>
@endsection