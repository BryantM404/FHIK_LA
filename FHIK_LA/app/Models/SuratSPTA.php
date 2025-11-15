<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSPTA extends Model
{
    use HasFactory;
    protected $table = 'SuratSPTA';
    protected $fillable = [
        'judulTugas',
        'tempatPenelitian',
        'alamatPenelitian',
        'mataKuliah',
        'pengajuan_id'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
