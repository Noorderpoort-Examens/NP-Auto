<?php

namespace App\Filament\Clusters\ServiceManagement\Resources\ServiceResource\Pages;

use App\Filament\Clusters\ServiceManagement\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
