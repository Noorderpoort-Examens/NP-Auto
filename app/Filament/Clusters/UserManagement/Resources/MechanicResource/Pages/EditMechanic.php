<?php

namespace App\Filament\Clusters\UserManagement\Resources\MechanicResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\MechanicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMechanic extends EditRecord
{
    protected static string $resource = MechanicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
