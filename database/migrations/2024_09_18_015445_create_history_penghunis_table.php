<?php

use App\Models\Rumah;
use App\Models\Penghuni;
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
        Schema::create('history_penghunis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Rumah::class)->constrained()->cascadeOnUpdate();
            $table->foreignIdFor(Penghuni::class)->constrained()->cascadeOnUpdate();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_penghunis');
    }
};
