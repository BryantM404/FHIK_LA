<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PimpinanDetail extends Model
{
    use HasFactory;
    protected $table = 'pimpinan_detail';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'jabatan',
        'fakultas',
        'programStudi',
        'ttdPath',
        'capPath',
        'pengguna_id'
    ];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
