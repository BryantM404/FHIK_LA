<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('mahasiswa_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tempatTanggalLahir', 100)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('kota', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('kodePos', 5)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('noHandphone', 20)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('namaWali', 60)->nullable();
            $table->string('namaIbuKandung', 60)->nullable();
            $table->string('pekerjaanOrangTua', 45)->nullable();
            $table->string('alamatOrangTua', 100)->nullable();
            $table->string('kotaOrangTua', 50)->nullable();
            $table->string('status', 15);

            $table->unsignedBigInteger('pengguna_id');
            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('mahasiswa_detail');
    }
};