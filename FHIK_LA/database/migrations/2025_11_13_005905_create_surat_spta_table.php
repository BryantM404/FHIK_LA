<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('SuratSPTA', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('judulTugas', 200);
            $table->string('tempatPenelitian', 50);
            $table->string('alamatPenelitian', 100);
            $table->string('mataKuliah', 45);

            $table->integer('pengajuan_id');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('SuratSPTA');
    }
};