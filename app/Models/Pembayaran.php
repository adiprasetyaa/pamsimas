<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pelanggan',
        'id_kasir',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'bukti_pembayaran',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir');
    }
}
