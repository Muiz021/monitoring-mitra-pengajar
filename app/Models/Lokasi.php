<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'lokasi';

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class); 
    }
}
