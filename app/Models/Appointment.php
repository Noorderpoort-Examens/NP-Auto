<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'client_name',
        'phonenumber',
        'additional_info',
        'date',
        'status',
        'service_id',
        'mechanic_id',
    ];

    // encrypt
    protected $casts = [
        'client_name' => 'encrypted',
        'phonenumber' => 'encrypted',
        'date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class);
    }
}
