<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kerjasama extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user', 'id');
	}

	public function usulans()
	{
		return $this->hasMany(Usulankerjasama::class, 'id_kerjasama', 'id');
	}
}
