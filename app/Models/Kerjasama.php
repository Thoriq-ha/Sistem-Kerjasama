<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kerjasama extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function mitra()
	{
		return $this->belongsTo(Mitra::class, 'id_mitra', 'id');
	}

	public function usulans()
	{
		return $this->hasMany(Usulankerjasama::class, 'id_kerjasama', 'id');
	}
}
