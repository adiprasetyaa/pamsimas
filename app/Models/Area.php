<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'area';
    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nama_area',
    ];

    public function petugas_meteran()
    {
        return $this->hasMany(PetugasMeteran::class, 'id_petugas');
    }

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class, 'id_pelanggan');
    }
}
