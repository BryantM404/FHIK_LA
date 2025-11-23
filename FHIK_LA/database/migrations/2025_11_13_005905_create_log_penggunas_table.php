<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('log_pengguna', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aktivitas', 100);
            $table->timestamp('created_at')->nullable();

            $table->unsignedBigInteger('pengguna_id');
            $table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('log_pengguna');
    }
};