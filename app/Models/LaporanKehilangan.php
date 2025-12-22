<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKehilangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_pelapor',
        'no_telepon',
        'email',
        'nama_item',
        'kategori_item',
        'deskripsi_barang',
        'kronologi',
        'foto',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
