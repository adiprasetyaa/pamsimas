<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_admin',
        'id_jenis_pengguna',
        'id_user',
        'id_petugas',
        'email_pelanggan',
        'kelurahan',
        'kecamatan',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'id_admin');
    }

    public function jenisPengguna()
    {
        return $this->belongsTo(JenisPengguna::class, 'id_jenis_pengguna');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function petugasMeteran()
    {
        return $this->belongsTo(PetugasMeteran::class, 'id_petugas');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_pelanggan');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pelanggan');
    }
}
