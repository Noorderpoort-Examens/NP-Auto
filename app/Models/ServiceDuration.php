<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDuration extends Model
{
    protected $fillable = [
        'name',
        'hours',
    ];

    public function services()
    {
        return $this->HasMany(Service::class);
    }
}
