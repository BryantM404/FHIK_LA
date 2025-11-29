<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('SuratKMA', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahunAkademik', 20);
            $table->string('instansi', 50)->nullable();
            $table->string('pangkatGolongan', 50)->nullable();
            $table->string('jabatan', 30)->nullable();

            $table->unsignedInteger('pengajuan_id');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('SuratKMA');
    }
};