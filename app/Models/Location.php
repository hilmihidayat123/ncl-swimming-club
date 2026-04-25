<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'title',
        'description',
        'map_embed',
        'is_active',
        'sort_order'
    ];
}
