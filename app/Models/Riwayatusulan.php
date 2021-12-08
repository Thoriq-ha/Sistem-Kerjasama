<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatusulan extends Model
{
	use HasFactory;
	public function usulan()
	{
		return $this->belongsTo(Usulankerjasama::class, 'id_usulankerjasama', 'id');
	}
}
