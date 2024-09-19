<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('iurans')->insert([
            [
                'jenis_iuran' => 'Satpam',
                'nominal' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_iuran' => 'Kebersihan',
                'nominal' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
