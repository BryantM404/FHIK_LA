<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengguna extends Model
{
    use HasFactory;
    protected $table = 'log_pengguna';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['aktivitas', 'created_at', 'pengguna_id'];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
