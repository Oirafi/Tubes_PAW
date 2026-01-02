<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan pada struktur tabel
     */
    public function up(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            // Mengubah kolom status agar lebih fleksibel dan mendukung status baru
            // dari sebelumnya mungkin VARCHAR pendek maupun ENUM terbatas
            $table->string('status')->default('menunggu')->change();
            // Jika ingin tetap ENUM, bisa pakai ini:
            // $table->enum('status', ['menunggu','selesai','ditolak'])->default('menunggu')->change();
        });
    }

    /**
     * Kembalikan ke kondisi sebelumnya jika diperlukan (rollback)
     */
    public function down(): void
    {
        Schema::table('laporan_kehilangans', function (Blueprint $table) {
            // Kembalikan ke tipe awal (opsional, sesuaikan dengan kondisi awal sebelum berubah)
            $table->string('status')->change();
        });
    }
};
