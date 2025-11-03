<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebun extends Model
{
    use HasFactory;

    protected $table = 'kebun';

    protected $fillable = [
        'nama',
        'luas_lahan',
        'id_petani',
    ];

    public function petani()
    {
        return $this->belongsTo(Petani::class, 'id_petani');
    }

    public function blokJalur()
    {
        return $this->hasMany(BlokJalur::class, 'id_kebun');
    }

    public function tanaman() {
        return $this->hasMany(Tanaman::class, 'id_kebun');
    }

}
