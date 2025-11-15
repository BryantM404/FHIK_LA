<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mahasiswa_detail', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('tempatTanggalLahir', 100);
            $table->string('alamat', 100);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('kodePos', 5);
            $table->string('programStudi', 45);
            $table->string('email', 150);
            $table->string('noHandphone', 20);
            $table->string('telepon', 20);
            $table->string('namaWali', 60);
            $table->string('namaIbuKandung', 60);
            $table->string('pekerjaanOrangTua', 45);
            $table->string('alamatOrangTua', 100);
            $table->string('kotaOrangTua', 50);
            $table->string('status', 15);

            $table->integer('pengguna_id');
            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('mahasiswa_detail');
    }
};