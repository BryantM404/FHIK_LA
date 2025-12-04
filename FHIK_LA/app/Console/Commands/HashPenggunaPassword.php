<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pengguna;

class HashPenggunaPassword extends Command
{
    protected $signature = 'pengguna:hash-password';
    protected $description = 'Hash semua password pengguna yang belum di-hash';

    public function handle()
    {
        $users = Pengguna::all();

        foreach ($users as $user) {
            if ($user->password && !str_starts_with($user->password, '$2y$')) {
                $user->password = $user->password;
                $user->save();
            }
        }

        $this->info('Selesai!');
    }
}
