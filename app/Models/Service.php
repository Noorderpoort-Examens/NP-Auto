<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'service_duration_id',
    ];

    public function serviceDuration()
    {
        return $this->belongsTo(ServiceDuration::class);
    }
}
