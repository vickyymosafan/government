<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kk_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('no_kk', 16)->nullable()->unique();
            $table->string('nama_kepala_keluarga', 100);
            $table->string('alamat', 200);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('kode_pos', 10);
            $table->integer('jumlah_anggota');
            $table->string('dokumen_ktp_path');
            $table->string('dokumen_akta_path')->nullable();
            $table->string('dokumen_pendukung_path')->nullable();
            $table->enum('status', ['PENDING', 'VERIFIED', 'REJECTED'])->default('PENDING');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kk_registrations');
    }
};
