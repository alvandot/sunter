<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolah_asals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->nullable();
            $table->enum('jenjang', ['SD', 'SMP', 'SMA', 'SMK'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah_asals');
    }
};
