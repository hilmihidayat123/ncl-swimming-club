<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftars';

    protected $fillable = [
        'nama_lengkap',
        'umur',
        'no_hp',
        'email',
        'layanan',
        'tipe_kelas',
        'catatan',
        'tanggal_mendaftar',
        'status',
        'is_read'
    ];
}
