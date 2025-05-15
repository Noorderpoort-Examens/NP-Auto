<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ValidateLicencePlate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $licencePlate = strtoupper(str_replace('-', '', $value));

        $apiDataGeneral = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$licencePlate}")->json();
        $apiDataFuel = Http::get("https://opendata.rdw.nl/resource/8ys7-d773.json?kenteken={$licencePlate}")->json();

        if (empty($apiDataGeneral[0]) || empty($apiDataFuel[0])) {
            $fail("Geen voertuiggegevens gevonden voor kenteken: {$licencePlate}");
        }
    }
}
