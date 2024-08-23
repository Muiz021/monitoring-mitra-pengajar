<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'mitra';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function analisis_kinerja()
    {
        return $this->hasMany(AnalisiKinerja::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function skor()
    {
        return $this->hasMany(Skor::class);
    }
}
