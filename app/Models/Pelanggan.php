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
        'email',
        'id_area'
    ];

    public function admin()
    {
        return $this->belongsTo(admin::class, 'id_admin');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    public function jenis_pengguna()
    {
        return $this->belongsTo(JenisPengguna::class, 'id_jenis_pengguna');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function petugas_meteran()
    {
        return $this->belongsTo(PetugasMeteran::class, 'id_petugas');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_tagihan');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran');
    }
}
