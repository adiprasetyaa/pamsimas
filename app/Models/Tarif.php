<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';

    protected $fillable = [
        'id_jenis_pengguna',
        'biaya_tarif',
        'minimum',
        'maximum',
    ];

    public function jenisPengguna()
    {
        return $this->belongsTo(JenisPengguna::class, 'id_jenis_pengguna');
    }
}
