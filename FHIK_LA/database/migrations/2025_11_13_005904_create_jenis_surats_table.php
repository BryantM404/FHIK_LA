<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jenis_surat', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama', 50);
        });
    }
    public function down(): void {
        Schema::dropIfExists('jenis_surat');
    }
};