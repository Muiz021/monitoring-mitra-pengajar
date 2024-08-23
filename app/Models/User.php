<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
    public function mitra()
    {
        return $this->hasOne(Mitra::class);
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }
    public function pelajar()
    {
        return $this->hasOne(Pelajar::class);
    }
}
