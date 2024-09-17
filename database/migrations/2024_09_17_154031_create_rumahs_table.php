<?php

use App\Models\Penghuni;
use App\Models\Rumah;
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
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_rumah', 10);
            $table->enum('status_rumah', ['Dihuni', 'Tidak Dihuni']);
            $table->timestamps();
        });

        Schema::create('history_penghuni', function (Blueprint $table) {
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
        Schema::dropIfExists('rumahs');
        Schema::dropIfExists('history_penghuni');
    }
};
