<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'program';

    public function presensi()
    {
        return $this->hasOne(Presensi::class,'program_id','id');
    }

    public function skor(){
        return $this->hasMany(Skor::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function analisis_kinerja()
    {
        return $this->hasMany(AnalisiKinerja::class);
    }
}
