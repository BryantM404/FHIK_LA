<?php

namespace Database\Seeders;

use App\Models\PimpinanDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PimpinanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pimpinanDetails = [
            [
                'id' => 1,
                'jabatan' => 'Dekan',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_410048.png',
                'pengguna_id' => 410048
            ],
            [
                'id' => 2,
                'jabatan' => 'Kaprodi Desain Interior',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_630040.png',
                'pengguna_id' => 630040
            ],
            [
                'id' => 3,
                'jabatan' => 'Koordinator TA - D.Interior',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_630057.png',
                'pengguna_id' => 630057
            ],
            [
                'id' => 4,
                'jabatan' => 'Koordinator KP - D.Interior',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_630007.png',
                'pengguna_id' => 630007
            ],
            [
                'id' => 5,
                'jabatan' => 'Kaprodi Desain Komunikasi Visual',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_640079.png',
                'pengguna_id' => 640079
            ],
            [
                'id' => 6,
                'jabatan' => 'Koordinator TA - DKV',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_640076.png',
                'pengguna_id' => 640076
            ],
            [
                'id' => 7,
                'jabatan' => 'Koordinator KP - DKV',
                'fakultas' => 'Fakultas Humaniora dan Industri Kreatif',
                'ttdPath' => 'storage/material/ttd/TTD_640003.png',
                'pengguna_id' => 640003
            ],
            
        ];

        foreach ($pimpinanDetails as $pimpinanDetail) {
            PimpinanDetail::create($pimpinanDetail);
        }
    }
}
