<?php

namespace App\Filament\Clusters\UserManagement\Resources\PermissionResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
