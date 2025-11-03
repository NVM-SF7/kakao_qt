<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taksasi extends Model
{
    use HasFactory;

    protected $table = 'taksasi';

    protected $fillable = [
        'tanggal',
        'pentil',
        'buah_muda',
        'buah_mengkal',
        'buah_masak',
        'id_tanaman',
    ];

    /**
     * Relasi ke model Tanaman
     */
    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'id_tanaman');
    }
}
