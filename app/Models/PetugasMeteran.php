<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetugasMeteran extends Model
{
    protected $table = 'petugas_meteran';
    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'id_admin',
        'id_user',
        'area',
    ];

    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'id_admin');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_petugas');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_petugas');
    }
}
