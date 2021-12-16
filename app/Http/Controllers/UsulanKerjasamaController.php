<?php

namespace App\Http\Controllers;

use App\Models\Kerjasama;
use App\Models\Riwayatusulan;
use App\Models\User;
use App\Models\Usulankerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanKerjasamaController extends Controller
{
	public function index()
	{

		if (Auth::user()->is_admin == 1) {
			$users = User::get();
			$usulankerjasama = Usulankerjasama::with('kerjasama')->get();
			$kerjasamas = Kerjasama::with('user')->get();
			return view('usulankerjasama.index', compact('users', 'usulankerjasama', 'kerjasamas'));
		} else {
			$kerjasamas = Kerjasama::with('user')->where('id_user', Auth::user()->id)->get();
			$usulankerjasama = Usulankerjasama::with('kerjasama')->get();
			// $usulankerjasama->kerjasama->where('id_user', Auth::user()->id)->get();
			// dd($usulankerjasama);
			return view('usulankerjasama.index', compact('usulankerjasama', 'kerjasamas'));
		}
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
			'tanggal_mulai'   => 'required',
			'tanggal_selesai'   => 'required',
			'id_kerjasama'   => 'required',
		]);
		$users = User::all();


		Usulankerjasama::find($id)->update($request->all());
		return redirect(route('usulan_kerjasama.index'));
	}

	public function accepted($accepted)
	{
		$status = Usulankerjasama::find($accepted);
		$status->update([
			'status' => 'ACCEPTED'
		]);
		if ($status) {
			Riwayatusulan::create([
				'status' => 'ACCEPTED',
				'id_usulankerjasama' => $accepted,
			]);
		}
		return redirect(route('usulan_kerjasama.index'));
	}
	public function rejected(Request $request, $rejected)
	{
		$status = Usulankerjasama::find($rejected);
		$status->update([
			'status' => 'REJECTED',
			'catatan' => $request->catatan,
		]);
		if ($status) {
			Riwayatusulan::create([
				'status' => 'REJECTED',
				'catatan' => $request->catatan,
				'id_usulankerjasama' => $rejected,
			]);
		}
		return redirect(route('usulan_kerjasama.index'));
	}

	public function destroy($id)
	{
		$uk = Usulankerjasama::find($id);
		$uk->delete();
		return redirect(route('usulan_kerjasama.index'));
	}
}
