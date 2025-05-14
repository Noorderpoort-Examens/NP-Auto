<?php

namespace App\Filament\Resources\OccasionResource\Pages;

use App\Filament\Resources\OccasionResource;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;

class CreateOccasion extends CreateRecord
{
    protected static string $resource = OccasionResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        //lisenceplates in all uppercase
        $plate = strtoupper(str_replace(' ', '', $data['liscenceplate']));

        //api calls first up
        $apiDataGeneral = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken={$plate}")->json();
        $apiDataFuel = Http::get("https://opendata.rdw.nl/resource/8ys7-d773.json?kenteken={$plate}")->json();

        //check for actual data
        if (!empty($apiDataGeneral[0]) && !empty($apiDataFuel[0])) {

            //first api data allocation (general info)
            $dataGeneral = $apiDataGeneral[0];

            $data['brand'] = $dataGeneral['merk'] ?? null;
            $data['model'] = $dataGeneral['handelsbenaming'] ?? null;
            $data['color'] = $dataGeneral['eerste_kleur'] ?? null;
            $data['buildyear'] = substr($dataGeneral['datum_eerste_toelating'] ?? '', 0, 4); //grab only the year part of the RDW data point
            $data['carbody'] = $dataGeneral['inrichting'] ?? null;
            $data['doors'] = (int) ($dataGeneral['aantal_deuren'] ?? 0);
            $data['seats'] = (int) ($dataGeneral['aantal_zitplaatsen'] ?? 0);
            $data['apk'] = Carbon::createFromFormat('Ymd', $dataGeneral['vervaldatum_apk'] ?? '')->toDateString(); //carbon instance date item
            $data['cylindercapacity'] = (int) ($dataGeneral['cilinderinhoud'] ?? 0);
            $data['weight'] = (int) ($dataGeneral['massa_rijklaar'] ?? 0);
            $data['fuelefficiency'] = $dataGeneral['zuinigheidsclassificatie'] ?? null;

            //second api data allocation (fuel)
            $dataFuel = $apiDataFuel[0];

            $data['fuel'] = $dataFuel['brandstof_omschrijving'] ?? null;
            $data['fuelconsumption'] = (int) $dataFuel['brandstofverbruik_gecombineerd'] ?? null;
        }

        return $data;
    }
}
