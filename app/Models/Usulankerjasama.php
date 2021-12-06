<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usulankerjasama extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = [
    //     'nama_kerjasama',
    //     'deskripsi_kerjasama',
    //     'jenis_kerjasama',
    //     'bidang_kerjasama',
    //     'tanggal_mulai',
    //     'tanggal_selesai',
    // ];

    // public function kerjasama()
    // {
    //     return $this->hasMany(Kerjasama::class, 'no_pengajuan', 'id');
    // }

    // public function riwayatUsulan()
    // {
    //     return $this->belongsTo(RiwayatUsulan::class, 'id_riwayat', 'id');
    // }

    // public function fileUsulanKerjasama()
    // {
    //     return $this->belongsTo(FileUsulanKerjasama::class, 'id_file_usulan', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
