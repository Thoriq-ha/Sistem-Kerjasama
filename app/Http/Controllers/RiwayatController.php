<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kerjasama;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // $usulankerjasama = Kerjasama::all();
        // $users = User::all();
        // dd($usulankerjasama->first()->user);
        return view('riwayat.index');
    }

    public function store(Request $request)
    {
        // // dd($request);
        // $this->validate($request, [
        //     'nama_kerjasama'     => 'required',
        //     'deskripsi_kerjasama'   => 'required',
        //     'jenis_kerjasama'   => 'required',
        //     'bidang_kerjasama'   => 'required',
        //     'tanggal_mulai'   => 'required',
        //     'tanggal_selesai'   => 'required',
        //     // 'file_usulan' => 'required|mimes:pdf|max:10000',
        //     'file_usulan' => 'required',
        //     'id_user'   => 'required',
        // ]);
        // $users = User::all();

        // if ($request->hasFile('file_usulan')) {
        //     $uk = new Usulankerjasama;
        //     $request->file('file_usulan')->move('file_usulan/', $request->file('file_usulan')->getClientOriginalName());
        //     $uk->path = $request->file('file_usulan')->getClientOriginalName();
        //     $usulan = Usulankerjasama::create([
        //         'nama_kerjasama'     => $request->nama_kerjasama,
        //         'deskripsi_kerjasama'   => $request->deskripsi_kerjasama,
        //         'jenis_kerjasama'   => $request->jenis_kerjasama,
        //         'bidang_kerjasama'   => $request->bidang_kerjasama,
        //         'tanggal_mulai'   => $request->tanggal_mulai,
        //         'tanggal_selesai'   => $request->tanggal_selesai,
        //         'file_usulan'   => $request->file_usulan,
        //         'id_user'   => $request->id_user,
        //     ]);
        //     return redirect(route('usulan_kerjasama.index'));
        // }
    }

    public function show($id)
    {
        // $users = User::all();
        // $uk = Usulankerjasama::where('id', $id)->first();
        // return view('usulankerjasama.show', compact('uk', 'users'));
    }

    public function update(Request $request, $id)
    {
        // // dd($request);
        // $this->validate($request, [
        //     'nama_kerjasama'     => 'required',
        //     'deskripsi_kerjasama'   => 'required',
        //     'jenis_kerjasama'   => 'required',
        //     'bidang_kerjasama'   => 'required',
        //     'tanggal_mulai'   => 'required',
        //     'tanggal_selesai'   => 'required',
        //     // 'file_usulan' => 'required|mimes:pdf|max:10000',
        //     'file_usulan' => 'required',
        //     'id_user'   => 'required',
        // ]);
        // $users = User::all();

        // if ($request->hasFile('file_usulan')) {
        //     $uk = new Usulankerjasama;
        //     $request->file('file_usulan')->move('file_usulan/', $request->file('file_usulan')->getClientOriginalName());
        //     $uk->path = $request->file('file_usulan')->getClientOriginalName();
        //     $usulan = Usulankerjasama::find($id)->update([
        //         'nama_kerjasama'     => $request->nama_kerjasama,
        //         'deskripsi_kerjasama'   => $request->deskripsi_kerjasama,
        //         'jenis_kerjasama'   => $request->jenis_kerjasama,
        //         'bidang_kerjasama'   => $request->bidang_kerjasama,
        //         'tanggal_mulai'   => $request->tanggal_mulai,
        //         'tanggal_selesai'   => $request->tanggal_selesai,
        //         'file_usulan'   => $request->file_usulan,
        //         'id_user'   => $request->id_user,
        //     ]);
        //     return redirect(route('usulan_kerjasama.index'));
        // }
    }

    public function destroy($id)
    {
        // $uk = Usulankerjasama::find($id);
        // $uk->delete();
        // return redirect(route('usulan_kerjasama.index'));
    }
}
