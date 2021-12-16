<?php

namespace App\Http\Controllers;

use App\Models\Riwayatusulan;
use App\Models\Usulankerjasama;

class RiwayatController extends Controller
{
	public function index()
	{
		$riwayats = Riwayatusulan::with('usulan')->get();

		return view('riwayat.index', compact('riwayats'));
	}
}
