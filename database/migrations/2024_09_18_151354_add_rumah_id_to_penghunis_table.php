<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rumah;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penghunis', function (Blueprint $table) {
            // Menambahkan kolom foreign key rumah_id
            $table->foreignIdFor(Rumah::class)->after('id')->constrained()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penghunis', function (Blueprint $table) {
            // Menghapus kolom foreign key rumah_id
            $table->dropForeign(['rumah_id']);
            $table->dropColumn('rumah_id');
        });
    }
};
