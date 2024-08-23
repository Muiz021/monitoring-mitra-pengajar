<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kegiatan';

    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
