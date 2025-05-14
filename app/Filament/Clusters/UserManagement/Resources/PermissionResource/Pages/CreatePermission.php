<?php

namespace App\Filament\Clusters\UserManagement\Resources\PermissionResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;
}
