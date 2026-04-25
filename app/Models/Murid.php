<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'umur',
        'no_hp',
        'email',
        'layanan',
        'tipe_kelas',
        'catatan',
        'status'
    ];
}
