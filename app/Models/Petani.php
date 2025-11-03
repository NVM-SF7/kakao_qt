<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    protected $table = 'petani';

    protected $fillable = [
        'foto',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'tgl_lahir',
        'nik',
    ];

    public function kebun() {
        return $this->hasMany(Kebun::class, 'id_petani');
    }

}
