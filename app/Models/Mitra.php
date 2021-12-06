<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lembaga',
        'jenis_lembaga',
    ];

    public function usulanKerjasama()
    {
        return $this->hasMany(UsulanKerjasama::class, 'id_mitra', 'id');
    }
}
