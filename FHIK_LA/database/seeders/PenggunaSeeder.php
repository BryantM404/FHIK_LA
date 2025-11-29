<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penggunas = [
            [
                'id' => 410048,
                'nama' => 'Prof.Anton Sutandio, S.S., M.Hum., Ph.D.',
                'password' => Hash::make('410048'),
                'role_id' => 3
            ],
            [
                'id' => 630040,
                'nama' => 'Yuma Chandrahera, S.Sn., M.Ds., HDII.',
                'password' => Hash::make('630040'),
                'programStudi' => '63 - Desain Interior',
                'role_id' => 3
            ],
            [
                'id' => 630057,
                'nama' => 'Yudita Royandi Prawirodihardjo, S.T., S.Ds., M.Ds., HDII.',
                'password' => Hash::make('630057'),
                'programStudi' => '63 - Desain Interior',
                'role_id' => 3
            ],
            [
                'id' => 630007,
                'nama' => 'Dr. Yunita Setyoningrum, S.Sn., M.Ds.',
                'password' => Hash::make('630007'),
                'programStudi' => '63 - Desain Interior',
                'role_id' => 3
            ],
            [
                'id' => 640079,
                'nama' => 'Elizabeth Susanti, B.A., M.Ds.,Ph.D',
                'password' => Hash::make('640079'),
                'programStudi' => '64 - Desain Komunikasi Visual',
                'role_id' => 3
            ],
            [
                'id' => 640076,
                'nama' => 'Monica Hartanti, S.Sn., M.Ds.',
                'password' => Hash::make('640076'),
                'programStudi' => '64 - Desain Komunikasi Visual',
                'role_id' => 3
            ],
            [
                'id' => 640003,
                'nama' => 'Hendra Setiawan, B.F.A., M.A.',
                'password' => Hash::make('640003'),
                'programStudi' => '64 - Desain Komunikasi Visual',
                'role_id' => 3
            ],
            [
                'id' => 810271,
                'nama' => 'Yohanes Edi Junaedi, A.Md',
                'password' => Hash::make('810271'),
                'role_id' => 1
            ],
            [
                'id' => 810263,
                'nama' => 'Erni Sri Muliawati, S.Ab',
                'password' => Hash::make('810263'),
                'programStudi' => '64 - Desain Komunikasi Visual',
                'role_id' => 2
            ],
            [
                'id' => 810253,
                'nama' => 'Petrus Benedektus Joko K., SS',
                'password' => Hash::make('810253'),
                'programStudi' => '63 - Desain Interior',
                'role_id' => 2
            ],
            [
                'id' => 810270,
                'nama' => 'Shinta Theresia Syam, SS',
                'password' => Hash::make('810270'),
                'role_id' => 2
            ],
            [
                'id' => 2363025,
                'nama' => 'FELIX TAN',
                'password' => Hash::make('2363025'),
                'programStudi' => '63 - Desain Interior',
                'role_id' => 4
            ],
            [
                'id' => 2364021,
                'nama' => 'ABIGAIL YASTINE CHRISTY KONDA',
                'password' => Hash::make('2364021'),
                'programStudi' => '64 - Desain Komunikasi Visual',
                'role_id' => 4
            ],
        ];

        foreach ($penggunas as $pengguna) {
            Pengguna::create($pengguna);
        }
    }
}
