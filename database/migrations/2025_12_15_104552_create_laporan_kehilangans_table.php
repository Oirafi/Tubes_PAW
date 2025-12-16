<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan_kehilangans', function (Blueprint $table) {
            $table->id();

            // relasi user
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            // data pelapor
            $table->string('nama_pelapor');
            $table->string('no_telepon');
            $table->string('email');

            // data barang
            $table->string('nama_item');
            $table->string('kategori_item');

            // detail
            $table->text('deskripsi_barang');
            $table->text('kronologi_kejadian');

            // upload
            $table->string('foto')->nullable();

            // status laporan
            $table->enum('status', [
                'Terkirim',
                'Sedang Verifikasi',
                'Terverifikasi',
                'Ditolak',
                'Ditemukan',
                'Selesai'
            ])->default('Terkirim');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_kehilangans');
    }
};
