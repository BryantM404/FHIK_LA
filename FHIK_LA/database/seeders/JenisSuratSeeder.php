<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurats = [
            [
                'id' => 1,
                'nama' => 'Surat Keterangan Mahasiswa Aktif',
            ],
            [
                'id' => 2,
                'nama' => 'Surat Survei Kerja Praktik',
            ],
            [
                'id' => 3,
                'nama' => 'Surat Survei Penelitian Tugas Akhir',
            ],
        ];

        foreach ($jenisSurats as $jenisSurat) {
            JenisSurat::create($jenisSurat);
        }
    }
}
