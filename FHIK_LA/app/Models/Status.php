<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = ['nama'];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'status_id');
    }
}
