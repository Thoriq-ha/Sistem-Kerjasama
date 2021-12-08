<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\User;
use App\Models\Usulankerjasama;
use Illuminate\Http\Request;

class UsulanKerjasamaController extends Controller
{
	public function index()
	{
		$usulankerjasama = Usulankerjasama::with('kerjasama')->get();
		$kerjasamas = Kerjasama::get();

		return view('usulankerjasama.index', compact('usulankerjasama', 'kerjasamas'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'tanggal_mulai'   => 'required',
			'tanggal_selesai'   => 'required',
			'id_kerjasama'   => 'required',
		]);

		$usulan = Usulankerjasama::create([
			'tanggal_mulai'   => $request->tanggal_mulai,
			'tanggal_selesai'   => $request->tanggal_selesai,
			'id_kerjasama'   => $request->id_kerjasama
		]);
		return redirect(route('usulan_kerjasama.index'));
	}

	public function show($id)
	{
		$uk = Usulankerjasama::with('kerjasama')->find($id);
		$kerjasamas = Kerjasama::get();
		return view('usulankerjasama.show', compact('uk', 'kerjasamas'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nama_kerjasama'     => 'required',
			'deskripsi_kerjasama'   => 'required',
			'jenis_kerjasama'   => 'required',
			'bidang_kerjasama'   => 'required',
			'tanggal_mulai'   => 'required',
			'tanggal_selesai'   => 'required',
			'file_usulan' => 'required',
			'id_user'   => 'required',
		]);
		$users = User::all();

		if ($request->hasFile('file_usulan')) {
			$uk = new Usulankerjasama;
			$request->file('file_usulan')->move('file_usulan/', $request->file('file_usulan')->getClientOriginalName());
			$uk->path = $request->file('file_usulan')->getClientOriginalName();
			$usulan = Usulankerjasama::find($id)->update([
				'nama_kerjasama'     => $request->nama_kerjasama,
				'deskripsi_kerjasama'   => $request->deskripsi_kerjasama,
				'jenis_kerjasama'   => $request->jenis_kerjasama,
				'bidang_kerjasama'   => $request->bidang_kerjasama,
				'tanggal_mulai'   => $request->tanggal_mulai,
				'tanggal_selesai'   => $request->tanggal_selesai,
				'file_usulan'   => $request->file_usulan,
				'id_user'   => $request->id_user,
			]);
			return redirect(route('usulan_kerjasama.index'));
		}
	}

	public function destroy($id)
	{
		$uk = Usulankerjasama::find($id);
		$uk->delete();
		return redirect(route('usulan_kerjasama.index'));
	}
}
