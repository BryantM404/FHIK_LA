<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKMA extends Model
{
    use HasFactory;
    protected $table = 'SuratKMA';
    protected $fillable = [
        'tahunAkademik',
        'instansi',
        'pangkatGolongan',
        'jabatan',
        'pengajuan_id'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
