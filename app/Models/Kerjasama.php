<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kerjasama extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function usulanKerjasama()
    // {
    //     return $this->hasMany(UsulanKerjasama::class, 'id_mitra', 'id');
    // }
}
