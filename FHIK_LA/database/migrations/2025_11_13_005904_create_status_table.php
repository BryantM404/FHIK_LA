<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('status', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama', 10);
        });
    }
    public function down(): void {
        Schema::dropIfExists('status');
    }
};