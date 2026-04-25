<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    protected $table = 'pelatih';

    protected $fillable = [
        'nama_pelatih',
        'title',
        'keterangan',
        'image',
        'nomor_hp'
    ];
}
