<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuss = [
            [
                'id' => 1,
                'nama' => 'Diproses',
            ],
            [
                'id' => 2,
                'nama' => 'Terverifikasi',
            ],
            [
                'id' => 3,
                'nama' => 'Disetujui',
            ],
            [
                'id' => 4,
                'nama' => 'Ditolak',
            ],
            
        ];

        foreach ($statuss as $status) {
            Status::create($status);
        }
    }
}
