<?php

namespace App\Filament\Clusters\UserManagement\Resources\MechanicResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\MechanicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMechanics extends ListRecords
{
    protected static string $resource = MechanicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
