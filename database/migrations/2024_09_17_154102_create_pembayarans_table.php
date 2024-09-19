<?php

use App\Models\Iuran;
use App\Models\Rumah;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rumah::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Iuran::class)->constrained()->cascadeOnUpdate();
            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->enum('jenis_pembayaran', ['Bulanan', 'Tahunan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
