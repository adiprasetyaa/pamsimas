<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $primaryKey = 'id_tagihan';

    protected $fillable = [
        'id_admin',
        'id_pelanggan',
        'id_petugas',
        'id_kasir',
        'status',
        'meteran',
        'bulan_penggunaan',
        'tanggal_penagihan',
        'jumlah_tagihan',
    ];

    public function admin()
    {
        return $this->belongsTo(Administrator::class, 'id_admin');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_tagihan');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function petugasMeteran()
    {
        return $this->belongsTo(PetugasMeteran::class, 'id_petugas');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }
}
