<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensis'; // pastikan sesuai dengan nama tabel di database kamu

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'kelas',
        'status_kehadiran',
        'keterangan',
    ];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(\App\Models\Siswa::class, 'siswa_id');
    }
}
