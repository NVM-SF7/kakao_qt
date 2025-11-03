<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    protected $fillable = [
        'nama',
    ];

    public function tanaman() {
        return $this->hasMany(Tanaman::class, 'id_status');
    }
}
