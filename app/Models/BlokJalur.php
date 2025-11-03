<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlokJalur extends Model
{
    use HasFactory;

    protected $table = 'blok_jalur';

    protected $fillable = [
        'nama',
        'id_kebun',
    ];

    public function kebun()
    {
        return $this->belongsTo(Kebun::class, 'id_kebun');
    }

    public function tanaman()
    {
        return $this->hasMany(Tanaman::class, 'id_blok_jalur');
    }
}
