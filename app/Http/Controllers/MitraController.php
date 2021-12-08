<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
	public function index()
	{
		$mitras = Mitra::get();
		return view('mitra.index', compact('mitras'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'nama_lembaga'     => 'required',
			'jenis_lembaga'   => 'required',
		]);

		Mitra::create([
			'nama_lembaga'     => $request->nama_lembaga,
			'jenis_lembaga'   => $request->jenis_lembaga
		]);
		return redirect(route('mitra.index'));
	}

	public function show($id)
	{
		$mitra = Mitra::first();
		return view('mitra.show', compact('mitra'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nama_lembaga'     => 'required',
			'jenis_lembaga'   => 'required',
		]);

		Mitra::find($id)->update([
			'nama_lembaga'     => $request->nama_lembaga,
			'jenis_lembaga'   => $request->jenis_lembaga
		]);
		return redirect(route('mitra.index'));
	}

	public function destroy($id)
	{
		$mt = Mitra::find($id);
		$mt->delete();
		return redirect(route('mitra.index'));
	}
}
