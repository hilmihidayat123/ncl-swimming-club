<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts'; // nama tabel, sesuaikan kalau mau beda

    protected $fillable = [
        'title',
        'description',
        'image',
        'experience_years',
        'is_active',
        'sort_order'
    ];

    
    
}

