<?php

namespace App\Http\Controllers;

use App\Models\Riwayatusulan;
use App\Models\Usulankerjasama;

class RiwayatController extends Controller
{
	public function index()
	{
		$riwayat = Riwayatusulan::with('usulan')->get();
		$usulans = Usulankerjasama::get();

		return view('riwayat.index', compact('riwayat', 'usulans'));
	}
}
