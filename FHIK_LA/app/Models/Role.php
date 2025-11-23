<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama'];
    public $timestamps = false;

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'role_id');
    }
}
