<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningTime extends Model
{
    protected $fillable = [
        'day',
        'start',
        'end',
    ];
}
