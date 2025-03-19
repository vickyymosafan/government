<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('akta_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nama_anak', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->string('alamat', 200);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('kode_pos', 10);
            $table->string('dokumen_kk_path');
            $table->string('dokumen_ktp_ayah_path');
            $table->string('dokumen_ktp_ibu_path');
            $table->string('dokumen_surat_lahir_path')->nullable();
            $table->string('dokumen_pendukung_path')->nullable();
            $table->enum('status', ['PENDING', 'VERIFIED', 'REJECTED'])->default('PENDING');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('akta_registrations');
    }
};
