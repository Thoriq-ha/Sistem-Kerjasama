<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usulankerjasama extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function kerjasama()
	{
		return $this->belongsTo(Kerjasama::class, 'id_kerjasama', 'id');
	}
}
