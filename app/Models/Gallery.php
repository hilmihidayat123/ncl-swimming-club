<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries'; // nama tabel, sesuaikan kalau beda

    protected $fillable = [
        'title',
        'image',
        'is_active',
        'keterangan',
        'sort_order'
    ];
}
