<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function pelajar(){
        return $this->belongsTo(Pelajar::class);
    }
}
