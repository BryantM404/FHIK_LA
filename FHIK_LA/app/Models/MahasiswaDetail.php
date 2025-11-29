<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaDetail extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa_detail';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'tempatTanggalLahir',
        'alamat',
        'kota',
        'provinsi',
        'kodePos',
        'email',
        'noHandphone',
        'telpon',
        'namaWali',
        'namaIbuKandung',
        'pekerjaanOrangTua',
        'alamatOrangTua',
        'kotaOrangTua',
        'status',
        'pengguna_id'
    ];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
