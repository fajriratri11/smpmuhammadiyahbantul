<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Presensi;

class PresensiController extends Controller
{
    // 🟢 Form Presensi (Record)
    public function record(Request $request)
    {
        $kelas = $request->get('class'); // input: name="class"
        $tanggal = $request->get('date', date('Y-m-d'));
        $siswas = [];

        if ($kelas) {
            $siswas = Siswa::where('kelas', $kelas)->orderBy('nama')->get();
        }

        return view('pages.attendance.record', compact('siswas', 'kelas', 'tanggal'));
    }

    // 🟢 Simpan Data Presensi
    public function store(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $kelas = $request->input('kelas');
        $status = $request->input('status');
        $notes = $request->input('notes');

        foreach ($status as $siswa_id => $kehadiran) {
            Presensi::updateOrCreate(
                [
                    'siswa_id' => $siswa_id,
                    'tanggal' => $tanggal,
                ],
                [
                    'kelas' => $kelas,
                    'status_kehadiran' => $kehadiran,
                    'keterangan' => $notes[$siswa_id] ?? null,
                ]
            );
        }

        return redirect()->route('presensi.record')
            ->with('success', 'Data presensi berhasil disimpan!');
    }

    // 🟢 Rekap Presensi
    public function recap(Request $request)
    {
        $bulan = $request->get('bulan', date('n'));
        $kelas = $request->get('kelas', '');

        $query = Presensi::with('siswa')->whereMonth('tanggal', $bulan);

        if (!empty($kelas)) {
            $query->where('kelas', $kelas);
        }

        $presensi = $query->get();
        $rekap = [];

        if ($presensi->count() > 0) {
            foreach ($presensi->groupBy('siswa_id') as $siswa_id => $presensiSiswa) {
                $siswa = $presensiSiswa->first()->siswa;
                $hadir = $presensiSiswa->where('status_kehadiran', 'Hadir')->count();
                $sakit = $presensiSiswa->where('status_kehadiran', 'Sakit')->count();
                $izin  = $presensiSiswa->where('status_kehadiran', 'Izin')->count();
                $alpa  = $presensiSiswa->where('status_kehadiran', 'Alfa')->count();
                $total = $hadir + $sakit + $izin + $alpa;
                $persentase = $total > 0 ? round(($hadir / $total) * 100, 1) : 0;

                $rekap[] = (object) [
                    'nis' => $siswa->nis ?? '-',
                    'nama' => $siswa->nama ?? 'Tidak Diketahui',
                    'kelas' => $presensiSiswa->first()->kelas ?? '-',
                    'hadir' => $hadir,
                    'sakit' => $sakit,
                    'izin' => $izin,
                    'alfa' => $alpa,
                    'persentase' => $persentase,
                ];
            }
        }

        // 🔥 Tambahkan default kosong biar tidak error
        $rekap = $rekap ?? [];

        return view('pages.attendance.recap', compact('rekap', 'bulan', 'kelas'));
    }

}
