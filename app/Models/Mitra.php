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

	public function kerjasamas()
	{
		return $this->hasMany(Kerjasama::class, 'id_mitra', 'id');
	}
}
