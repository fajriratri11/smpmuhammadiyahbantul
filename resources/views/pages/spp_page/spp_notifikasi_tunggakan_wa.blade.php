@extends('layouts.spp-dashboard')

@section('content')
<header class="bg-white shadow dark:bg-gray-800">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold leading-tight text-gray-900 dark:text-white">
            🔔 Kirim Notifikasi WhatsApp Tagihan
        </h1>
    </div>
</header>
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        {{-- Konten Utama berada di dalam shadow box besar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 dark:bg-gray-700">

            <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-lg border-l-4 border-yellow-400 mb-6">
                <p class="text-sm text-yellow-800 dark:text-yellow-200 font-semibold">
                     ⚠️ Halaman ini digunakan untuk mengirimkan pesan pengingat tagihan SPP ke nomor WhatsApp orang tua/wali siswa.
                </p>
            </div>

            {{-- FORMULIR FILTER --}}
            <form id="filterForm" onsubmit="return false;">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Filter Tahun Ajaran --}}
                    <div>
                        <label for="tahun_ajaran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tahun Ajaran
                        </label>
                        <select id="tahun_ajaran" name="tahun_ajaran" required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 rounded-md shadow-sm p-2 text-sm">
                            <option value="2025/2026" selected>2025/2026</option>
                            <option value="2024/2025">2024/2025</option>
                        </select>
                    </div>

                    {{-- Filter Status Tagihan --}}
                    <div>
                        <label for="status_tagihan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status Tagihan
                        </label>
                        <select id="status_tagihan" name="status_tagihan[]" multiple required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-sm">
                            <option value="dicicil" selected>Dicicil</option>
                            <option value="belum_lunas" selected>Belum Lunas</option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Pilih status siswa yang akan menerima notifikasi.</p>
                    </div>

                    {{-- Filter Bulan Tagihan --}}
                    <div>
                        <label for="bulan_tagihan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Bulan Tagihan
                        </label>
                        <select id="bulan_tagihan" name="bulan_tagihan[]" multiple required
                            class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm p-2 text-sm">
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret" selected>Maret</option>
                            <option value="April" selected>April</option>
                            <option value="Mei" selected>Mei</option>
                            <option value="Juni" selected>Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Pilih bulan tagihan yang akan dihitung.</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" id="filterButton"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                        🔍 Cari Siswa & Hitung Tunggakan
                    </button>
                </div>
            </form>

            <hr class="my-8 border-gray-200 dark:border-gray-600">

            {{-- Hasil Filter & Pratinjau Pesan (Sembunyi sebelum filter) --}}
            <div id="resultContainer" class="hidden">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Hasil Filter dan Aksi</h2>

                <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg mb-6">
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                        Total Siswa Ditemukan: <span id="totalSiswaCount" class="text-indigo-600 font-bold">0</span> Siswa
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        *Notifikasi akan dikirim ke **<span id="validPhoneNumberCount">0</span>** nomor WhatsApp aktif.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    {{-- Form Konten Pesan --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3">Konten Pesan WhatsApp</h3>
                        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg border dark:border-gray-700">
                            <label for="message_template" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tulis Pesan Anda:
                            </label>
                            <textarea id="message_template" name="message_template" rows="8" required
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm p-3 text-sm"
                                placeholder="Gunakan placeholder seperti {nama_siswa}, {total_tunggakan}, {bulan_tagihan}">
Yth. Bapak/Ibu Wali Murid {nama_siswa},

Kami informasikan bahwa tagihan SPP ananda untuk bulan {bulan_tagihan} hingga saat ini masih terdapat tunggakan.

Total Tunggakan: Rp{total_tunggakan}

Mohon segera diselesaikan. Batas pembayaran {tgl_jatuh_tempo}.

Terima kasih.
[Admin SPP Sekolah]</textarea>
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                **Placeholder Tersedia:** `{nama_siswa}`, `{kelas_siswa}`, `{total_tunggakan}`, `{bulan_tagihan}`, `{tgl_jatuh_tempo}`.
                            </p>
                        </div>
                    </div>

                    {{-- Pratinjau Pesan --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3">Pratinjau Pesan (Contoh)</h3>
                        <div class="bg-green-50 dark:bg-gray-900 p-4 rounded-lg border border-green-200 dark:border-gray-700 min-h-[250px] flex items-center">
                            <pre id="messagePreview" class="whitespace-pre-wrap text-sm text-gray-800 dark:text-gray-200 font-sans leading-relaxed">
[Pratinjau pesan akan muncul di sini setelah menekan tombol 'Cari Siswa']
                            </pre>
                        </div>
                    </div>
                </div>

                {{-- Tombol Kirim Massal (Gunakan form dummy untuk aksi) --}}
                <div class="mt-8 flex justify-end">
                    <button type="button" id="sendButton" onclick="alert('Simulasi: Proses pengiriman ke ' + document.getElementById('validPhoneNumberCount').textContent + ' siswa dimulai. Logikanya perlu diimplementasikan di backend.')"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-xl transition duration-300 ease-in-out transform hover:scale-105 disabled:bg-gray-400"
                        disabled>
                        🚀 Kirim Notifikasi ke <span id="sendButtonCount">0</span> Siswa
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filterButton');
        const resultContainer = document.getElementById('resultContainer');
        const totalSiswaCount = document.getElementById('totalSiswaCount');
        const validPhoneNumberCount = document.getElementById('validPhoneNumberCount');
        const sendButton = document.getElementById('sendButton');
        const sendButtonCount = document.getElementById('sendButtonCount');
        const messageTemplate = document.getElementById('message_template');
        const messagePreview = document.getElementById('messagePreview');
        const filterForm = document.getElementById('filterForm');

        // Data Simulasi Hasil Filter (Saat belum ada backend)
        const mockFilterResult = {
            total_siswa: 52,
            valid_phone_numbers: 48,
            contoh_siswa: {
                nama_siswa: "Siti Aisyah",
                kelas_siswa: "VIII A",
                total_tunggakan: "1.600.000",
                // Contoh Bulan Tagihan disimulasikan dari bulan-bulan yang dipilih pada select option
                bulan_tagihan: "Maret, April, Mei, Juni, dan bulan lainnya.",
                tgl_jatuh_tempo: "31 Oktober 2025"
            }
        };

        // Fungsi untuk mengupdate pratinjau pesan
        const updatePreview = (contohData) => {
            let template = messageTemplate.value;
            
            // Mengganti placeholder dengan data contoh
            template = template.replace(/{nama_siswa}/g, contohData.nama_siswa);
            template = template.replace(/{kelas_siswa}/g, contohData.kelas_siswa);
            template = template.replace(/{total_tunggakan}/g, contohData.total_tunggakan);
            template = template.replace(/{bulan_tagihan}/g, contohData.bulan_tagihan);
            template = template.replace(/{tgl_jatuh_tempo}/g, contohData.tgl_jatuh_tempo);

            messagePreview.textContent = template;
        };

        // Event Listener Tombol Filter (Simulasi)
        filterButton.addEventListener('click', function() {
            // Cek apakah ada bulan yang dipilih (Minimal validasi front-end)
            const bulanSelect = document.getElementById('bulan_tagihan');
            const selectedBulan = Array.from(bulanSelect.options).filter(option => option.selected).map(option => option.value);

            if (selectedBulan.length === 0) {
                 alert('Mohon pilih minimal satu Bulan Tagihan.');
                 return;
            }

            // Simulasi hitungan tunggakan dari bulan yang dipilih
            let bulanString = selectedBulan.join(', ');
            // Update data contoh dengan bulan yang dipilih
            mockFilterResult.contoh_siswa.bulan_tagihan = bulanString;

            // Tampilkan Hasil
            totalSiswaCount.textContent = mockFilterResult.total_siswa;
            validPhoneNumberCount.textContent = mockFilterResult.valid_phone_numbers;
            sendButtonCount.textContent = mockFilterResult.valid_phone_numbers;

            // Aktifkan Tombol Kirim jika ada siswa yang akan dikirim notifikasi
            if (mockFilterResult.valid_phone_numbers > 0) {
                sendButton.disabled = false;
                sendButton.classList.remove('disabled:bg-gray-400');
            } else {
                sendButton.disabled = true;
                sendButton.classList.add('disabled:bg-gray-400');
            }

            // Update Pratinjau dengan data terbaru
            updatePreview(mockFilterResult.contoh_siswa);

            // Tampilkan Container Hasil
            resultContainer.classList.remove('hidden');
            resultContainer.scrollIntoView({ behavior: 'smooth' });
        });

        // Event Listener untuk update Pratinjau secara real-time
        messageTemplate.addEventListener('input', () => updatePreview(mockFilterResult.contoh_siswa));
        
        // Atur pratinjau awal
        messagePreview.textContent = "[Pratinjau pesan akan muncul di sini setelah menekan tombol 'Cari Siswa']";
    });
</script>
@endsection