<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSKP extends Model
{
    use HasFactory;
    protected $table = 'SuratSKP';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'tempatPenelitian', 
        'alamatPenelitian', 
        'pengajuan_id'
    ];
    public $timestamps = false;


    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
