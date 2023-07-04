<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
        'email_verified_at',
    ];

    public function administrator()
    {
        return $this->hasOne(Administrator::class, 'id_user');
    }

    public function petugasMeteran()
    {
        return $this->hasOne(PetugasMeteran::class, 'id_user');
    }

    public function kasir()
    {
        return $this->hasOne(Kasir::class, 'id_user');
    }

    public function pelanggan()
    {
        return $this->hasOne(Pelanggan::class, 'id_user');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id_pelanggan');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pelanggan');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
