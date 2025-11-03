<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanaman';

    protected $fillable = [
        'code',
        'tanggal_pembibitan',
        'tanggal_penanaman',
        'id_klon',
        'id_blok_jalur',
        'id_status',
        'id_taksasi',
        'id_kebun',
        'status',
    ];


    public function klon()
    {
        return $this->belongsTo(Klon::class, 'id_klon');
    }

    public function Kebun()
    {
        return $this->belongsTo(Kebun::class, 'id_kebun');
    }


    public function blokJalur()
    {
        return $this->belongsTo(BlokJalur::class, 'id_blok_jalur');
    }


    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

    public function taksasi() {
        return $this->hasMany(Taksasi::class, 'id_tanaman');
    }
}
