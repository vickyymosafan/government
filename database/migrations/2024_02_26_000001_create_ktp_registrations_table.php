<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ktp_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 200);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('agama', 20);
            $table->enum('status_perkawinan', ['BELUM KAWIN', 'KAWIN', 'CERAI HIDUP', 'CERAI MATI']);
            $table->string('pekerjaan', 50);
            $table->string('kewarganegaraan', 3);
            $table->string('foto_path');
            $table->string('dokumen_pendukung_path');
            $table->enum('status', ['PENDING', 'VERIFIED', 'REJECTED'])->default('PENDING');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ktp_registrations');
    }
};
