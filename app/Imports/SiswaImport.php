<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * Fungsi ini akan dipanggil untuk setiap baris data di file Excel.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nama' => $row['nama'] ?? null,
            'nis' => $row['nis'] ?? null,
            'jenis_kelamin' => $row['jenis_kelamin'] ?? null,
            'kelas' => $row['kelas'] ?? null,
        ]);
    }
}
