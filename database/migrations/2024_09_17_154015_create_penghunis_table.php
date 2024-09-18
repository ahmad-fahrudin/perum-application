<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('nomor_telepon', 20);
            $table->enum('status_kontrak', ['Kontrak', 'Tetap']);
            $table->enum('status_menikah', ['Menikah', 'Bekum Menikah']);
            $table->date('tanggal_masuk');
            $table->enum('status_iuran_bulanan', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghunis');
    }
};
