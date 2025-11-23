<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSPTA extends Model
{
    use HasFactory;
    protected $table = 'SuratSPTA';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'judulTugas',
        'tempatPenelitian',
        'alamatPenelitian',
        'mataKuliah',
        'dosenMataKuliah',
        'pengajuan_id'
    ];
    public $timestamps = false;

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
