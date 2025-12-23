<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class LaporanTemuan extends Model
{
    protected $fillable = [
    'kode_temuan',
    'nama_barang',
    'kategori',
    'deskripsi',
    'lokasi_ditemukan',
    'tanggal_ditemukan',
    'foto',
    ];

}