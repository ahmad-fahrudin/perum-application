<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rumah;

class RumahSeeder extends Seeder
{
    public function run()
    {
        // Rumah 1 sampai 15 dengan status Dihuni
        for ($i = 1; $i <= 15; $i++) {
            Rumah::create([
                'nama' => 'Rumah ' . $i,
                'status' => 'Dihuni'
            ]);
        }

        // Rumah 16 sampai 20 dengan status Tidak Dihuni
        for ($i = 16; $i <= 20; $i++) {
            Rumah::create([
                'nama' => 'Rumah ' . $i,
                'status' => 'Tidak Dihuni'
            ]);
        }
    }
}
