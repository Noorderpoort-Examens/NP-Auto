<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{

    // translation included
    protected $fillable = [
        'licenceplate', //kenteken
        'advertisingtitle', //advertentietitel
        'askprice', //vraagprijs
        'images', //afbeeldingen
        'brand', //merk
        'model', //model
        'color', //kleur
        'description', //omschrijving
        'mileage', //kilometerstand
        'buildyear', //bouwjaar
        'carbody', //carosserie
        'fuel', //brandstof (api call 2)
        'transmission', //transmissie (manual input instead of api)
        'doors', //deuren
        'seats', //zitplaatsen
        'apk', //vervaldatum apk
        'fuelconsumption', //brandstofverbruik
        'fuelefficiency', //zuinigheidsclassificatie
        'cylindercapacity', //cilinderinhoud
        'weight', //gewicht
        'btw', //BTW hard coded 21%, no api call
        'sold', //internal usage
        'reserved', //internal usage
        'hidden', //internal usage
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
