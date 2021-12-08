<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\Mitra;
use Illuminate\Http\Request;

class KerjasamaController extends Controller
{
	public function index()
	{
		$mitras = Mitra::get();
		$kerjasamas = Kerjasama::with('mitra')->get();

		return view('kerjasama.index', compact('mitras', 'kerjasamas'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'file_kerjasama' => 'required',
			'id_mitra'   => 'required',
			'nama_kerjasama'   => 'required',
			'deskripsi_kerjasama'   => 'required',
			'jenis_kerjasama'   => 'required',
			'bidang_kerjasama'   => 'required'
		]);

		if ($request->hasFile('file_kerjasama')) {
			$kj = new Kerjasama();
			$request->file('file_kerjasama')->move('file_kerjasama/', $request->file('file_kerjasama')->getClientOriginalName());
			$kj->file_kerjasama = $request->file('file_kerjasama')->getClientOriginalName();
			$kj->id_mitra = $request->id_mitra;
			$kj->nama_kerjasama = $request->nama_kerjasama;
			$kj->deskripsi_kerjasama = $request->deskripsi_kerjasama;
			$kj->jenis_kerjasama = $request->jenis_kerjasama;
			$kj->bidang_kerjasama = $request->bidang_kerjasama;

			$kj->save();
			return redirect(route('kerjasama.index'));
		}
	}

	public function show($id)
	{
		$kerjasama = Kerjasama::first();
		$mitras = Mitra::get();
		return view('kerjasama.show', compact('kerjasama', 'mitras'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'id_mitra'   => 'required',
			'nama_kerjasama'   => 'required',
			'deskripsi_kerjasama'   => 'required',
			'jenis_kerjasama'   => 'required',
			'bidang_kerjasama'   => 'required'
		]);

		Kerjasama::find($id)->update([
			'id_mitra' => $request->id_mitra,
			'nama_kerjasama' => $request->nama_kerjasama,
			'deskripsi_kerjasama' => $request->deskripsi_kerjasama,
			'jenis_kerjasama' => $request->jenis_kerjasama,
			'bidang_kerjasama' => $request->bidang_kerjasama
		]);
		return redirect(route('kerjasama.index'));
	}

	public function destroy($id)
	{
		$kj = Kerjasama::find($id);
		$kj->delete();
		return redirect(route('kerjasama.index'));
	}
}
