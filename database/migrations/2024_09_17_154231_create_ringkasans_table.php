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
        Schema::create('ringkasans', function (Blueprint $table) {
            $table->id();
            $table->string('bulan_tahun', 7);  // Format: YYYY-MM
            $table->decimal('total_pemasukan', 10, 2);
            $table->decimal('total_pengeluaran', 10, 2);
            $table->decimal('saldo', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ringkasans');
    }
};
