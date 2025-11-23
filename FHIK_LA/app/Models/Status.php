<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'status_id');
    }
}
