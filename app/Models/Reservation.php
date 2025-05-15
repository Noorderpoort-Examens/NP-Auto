<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable = [
        'firstname',
        'lastname',
        'phonenumber',
        'email',
    ];

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }

}
