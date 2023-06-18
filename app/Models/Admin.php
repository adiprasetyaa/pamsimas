<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    protected $table = 'administrator';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jenisPengguna()
    {
        return $this->hasMany(JenisPengguna::class, 'id_admin');
    }

    public function petugasMeteran()
    {
        return $this->hasMany(PetugasMeteran::class, 'id_admin');
    }

    public function kasir()
    {
        return $this->hasMany(Kasir::class, 'id_admin');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_admin');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_admin');
    }
}