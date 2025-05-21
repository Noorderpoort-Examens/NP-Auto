<?php

namespace App\Filament\Clusters\ServiceManagement\Resources\ServiceDurationResource\Pages;

use App\Filament\Clusters\ServiceManagement\Resources\ServiceDurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceDurations extends ListRecords
{
    protected static string $resource = ServiceDurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
