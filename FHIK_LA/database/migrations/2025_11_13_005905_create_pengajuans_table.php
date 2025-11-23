<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noSurat', 70)->nullable();
            $table->string('alasanPenolakan', 100)->nullable();
            $table->string('dokumenPath', 200)->nullable();
            $table->timestamp('tanggalPengajuan')->nullable();
            $table->timestamp('tanggalDisetujui')->nullable();
            $table->integer('koordinator_id')->nullable();

            $table->unsignedBigInteger('pengguna_id');
            $table->unsignedInteger('jenisSurat_id');
            $table->unsignedInteger('status_id');

            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade');
            $table->foreign('jenisSurat_id')->references('id')->on('jenis_surat')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('pengajuan');
    }
};