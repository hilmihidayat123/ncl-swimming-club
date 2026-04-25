<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'title',
        'coach_name',
        'day',
        'start_time',
        'end_time',
        'location'
    ];
}