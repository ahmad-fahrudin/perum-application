<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenghuniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            DB::table('penghunis')->insert([
                'rumah_id' => $i,
                'nama' => 'Penghuni ' . $i,
                'alamat' => 'Alamat Penghuni ' . $i,
                'foto_ktp' => 'ktp' . $i . '.jpg',
                'telepon' => '081234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'status_kontrak' => 'Tetap',
                'status_menikah' => 'Menikah',
                'tanggal_masuk' => now()->subDays($i * 30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
