<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Authenticatable
{
    use HasFactory;
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = false;
    protected $fillable = ['id', 'nama', 'password', 'programStudi', 'role_id'];
    public $timestamps = false;

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function mahasiswaDetail()
    {
        return $this->hasOne(MahasiswaDetail::class, 'pengguna_id');
    }

    public function pimpinanDetail()
    {
        return $this->hasOne(PimpinanDetail::class, 'pengguna_id');
    }

    public function logPengguna()
    {
        return $this->hasMany(LogPengguna::class, 'pengguna_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'pengguna_id');
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function setPasswordAttribute($value)
    {
        if (!empty($value) && !str_starts_with($value, '$2y$')) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
