<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroCard extends Model
{
    protected $table = 'hero_card';

    protected $fillable = [
        'alert',
        'keterangan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}