<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = 'kasir';
    protected $primaryKey = 'id_kasir';

    protected $fillable = [
        'id_admin',
        'id_user',
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
        return $this->hasMany(Pembayaran::class, 'id_kasir');
    }

    public function tagihan(){
        return $this->hasMany(Tagihan::class,'id_kasir');
    }
}
