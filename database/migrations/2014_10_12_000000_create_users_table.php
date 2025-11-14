<?php
// database/migrations/2014_10_12_000000_create_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // --- KOLOM KUSTOM ANDA ---
            $table->string('nis')->unique(); // Kolom NIS, unik

            // Kolom Role sebagai PILIHAN (ENUM), bukan teks bebas
            // Sesuaikan isi array ['admin', 'guru', 'siswa'] dengan kebutuhan Anda
            $table->enum('role', ['bk', 'siswa', 'spp'])->default('siswa');
            
            // --- KOLOM DEFAULT LARAVEL (Dimodifikasi) ---
            $table->string('email')->nullable(); // Email opsional
            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};