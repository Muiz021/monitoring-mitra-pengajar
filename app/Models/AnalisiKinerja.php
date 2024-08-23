<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisiKinerja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kinerja_mitra';

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
