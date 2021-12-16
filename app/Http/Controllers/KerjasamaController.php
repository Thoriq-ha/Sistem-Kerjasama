<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjasamaController extends Controller
{
	public function index()
	{
		if (Auth::user()->is_admin == 1) {
			$users = User::get();
			$kerjasamas = Kerjasama::with('user')->get();
			return view('kerjasama.index', compact('users', 'kerjasamas'));
		} else {
			$kerjasamas = Kerjasama::with('user')->where('id_user', Auth::user()->id)->get();

			return view('kerjasama.index', compact('kerjasamas'));
		}
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'file_kerjasama' => 'required',
			'nama_kerjasama'   => 'required',
			'deskripsi_kerjasama'   => 'required',
			'jenis_kerjasama'   => 'required',
			'bidang_kerjasama'   => 'required'
		]);

		if ($request->hasFile('file_kerjasama')) {
			$kj = new Kerjasama();
			$request->file('file_kerjasama')->move('file_kerjasama/', $request->file('file_kerjasama')->getClientOriginalName());
			$kj->file_kerjasama = $request->file('file_kerjasama')->getClientOriginalName();
			if (Auth::user()->is_admin ==  1) {
				$kj->id_user = $request->id_user;
			} else {
				$kj->id_user = Auth::user()->id;
			}

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
		$kerjasama = Kerjasama::find($id);
		$users = User::get();
		return view('kerjasama.show', compact('kerjasama', 'users'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'nama_kerjasama'   => 'required',
			'deskripsi_kerjasama'   => 'required',
			'jenis_kerjasama'   => 'required',
			'bidang_kerjasama'   => 'required'
		]);
		if (Auth::user()->is_admin ==  1) {
			Kerjasama::find($id)->update([
				'id_user' => $request->id_user,
				'nama_kerjasama' => $request->nama_kerjasama,
				'deskripsi_kerjasama' => $request->deskripsi_kerjasama,
				'jenis_kerjasama' => $request->jenis_kerjasama,
				'bidang_kerjasama' => $request->bidang_kerjasama
			]);
		} else {
			Kerjasama::find($id)->update([
				'id_user' => Auth::user()->id,
				'nama_kerjasama' => $request->nama_kerjasama,
				'deskripsi_kerjasama' => $request->deskripsi_kerjasama,
				'jenis_kerjasama' => $request->jenis_kerjasama,
				'bidang_kerjasama' => $request->bidang_kerjasama
			]);
		}

		return redirect(route('kerjasama.index'));
	}


	public function destroy($id)
	{
		$kj = Kerjasama::find($id);
		$kj->delete();
		return redirect(route('kerjasama.index'));
	}
}
