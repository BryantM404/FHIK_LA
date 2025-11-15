<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $fillable = [
        'noSurat',
        'alasanPenolakan',
        'dokumenPath',
        'tanggalPengajuan',
        'tanggalDisetujui',
        'divalidasiOleh',
        'disetujuiOleh',
        'pengguna_id',
        'jenisSurat_id',
        'status_id'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenisSurat_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function suratSKP()
    {
        return $this->hasOne(SuratSKP::class, 'pengajuan_id');
    }

    public function suratKMA()
    {
        return $this->hasOne(SuratKMA::class, 'pengajuan_id');
    }

    public function suratSPTA()
    {
        return $this->hasOne(SuratSPTA::class, 'pengajuan_id');
    }
}
