<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan_kehilangans', function (Blueprint $table) {
            $table->id();

            
            // relasi user (pelapor)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('nama_pelapor');
            $table->string('no_telepon');
            $table->string('email');

            $table->string('nama_item');
            $table->string('kategori_item');

            $table->text('deskripsi_barang');
            $table->text('kronologi');

            $table->string('foto')->nullable();

            $table->enum('status', ['menunggu', 'diproses', 'selesai'])
                  ->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_kehilangans');
    }
};
