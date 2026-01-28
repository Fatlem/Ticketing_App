<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        Lokasi::create([
            'nama_lokasi' => 'Stadion Utama',
            'alamat' => 'Jl. Olahraga No. 1, Jakarta',
            'kapasitas' => '50000'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'Hall Convention Center',
            'alamat' => 'Jl. Gatot Subroto No. 5, Jakarta',
            'kapasitas' => '2000'
        ]);
    }
}