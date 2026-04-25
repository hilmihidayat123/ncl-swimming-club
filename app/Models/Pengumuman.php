<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'nama_alert',
        'judul_pengumuman',
        'tanggal',
        'keterangan',
        'nomor_hp'
    ];
}
