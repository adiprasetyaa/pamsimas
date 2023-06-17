<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengguna extends Model
{
    use HasFactory;
    protected $table = 'jenis_pengguna';
    protected $primaryKey = 'id_jenis_pengguna';

    protected $fillable = [
        'nama_jenis_pengguna',
        'id_admin',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'id_admin');
    }

    public function tarif()
    {
        return $this->hasMany(Tarif::class, 'id_jenis_pengguna');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_jenis_pengguna');
    }
}
