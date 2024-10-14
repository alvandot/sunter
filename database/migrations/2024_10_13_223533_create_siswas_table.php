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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('nama_orang_tua');
            $table->string('nomor_telepon_orang_tua');
            $table->foreignId('sekolah_asal_id')->constrained('sekolah_asals');
            $table->enum('jenjang_bimbel', ['SD', 'SMP', 'SMA']);
            $table->date('tanggal_bergabung')->default(now());
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
