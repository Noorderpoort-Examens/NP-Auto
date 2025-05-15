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
        'occasion_id',
    ];

    // wwe cant just save it as plain text
    protected $casts = [
        'phonenumber' => 'encrypted',
        'email' => 'encrypted',
        'firstname' => 'encrypted',
        'lastname' => 'encrypted',
    ];

    // automatically reserve an occasion in occasion model when reservation is made
    protected static function booted()
    {
        // on create
        static::created(function ($reservation) {
            $occasion = Occasion::find($reservation->occasion_id);
            if ($occasion) {
                $occasion->reserved = true;
                $occasion->save();
            }
        });

        //on delete
        static::deleted(function ($reservation) {
            $occasion = Occasion::find($reservation->occasion_id);
            if ($occasion) {
                $occasion->reserved = false;
                $occasion->save();
            }
        });
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }

}
