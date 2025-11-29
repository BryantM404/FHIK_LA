<?php

namespace Database\Seeders;

use App\Models\MahasiswaDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaDetails = [
            [
                'id' => 1,
                'tempatTanggalLahir' => 'PEKANBARU / 2005-02-27 00:00:00',
                'alamat' => 'JL SURYA SUMANTRI NO63A (KOST FAVORITE)',
                'kota' => 'KOTA BANDUNG',
                'provinsi' => 'JAWA BARAT',
                'kodePos' => '40164',
                'email' => 'velix.tan@gmail.com',
                'noHandphone' => '81287620558',
                'telepon' => '',
                'namaWali' => 'JULIA',
                'namaIbuKandung' => 'JULIA',
                'pekerjaanOrangTua' => '',
                'alamatOrangTua' => '',
                'kotaOrangTua' => '',
                'status' => 'A',
                'pengguna_id' => 2363025,
            ],
            [
                'id' => 2,
                'tempatTanggalLahir' => 'BANDUNG / 2005-07-29 00:00:00',
                'alamat' => 'JL. ROKET II NO. 113',
                'kota' => 'KOTA CIMAHI',
                'provinsi' => 'JAWA BARAT',
                'kodePos' => '40511',
                'email' => 'abigailyastine@gmail.com',
                'noHandphone' => '81221869353',
                'telepon' => '6281221869353',
                'namaWali' => 'YAVET SULLE KONDA',
                'namaIbuKandung' => 'CHRISTINE ROSELINE JUSUP',
                'pekerjaanOrangTua' => '',
                'alamatOrangTua' => '',
                'kotaOrangTua' => '',
                'status' => 'A',
                'pengguna_id' => 2364021,
            ],   
        ];

        foreach ($mahasiswaDetails as $mahasiswaDetail) {
            MahasiswaDetail::create($mahasiswaDetail);
        }
    }
}
