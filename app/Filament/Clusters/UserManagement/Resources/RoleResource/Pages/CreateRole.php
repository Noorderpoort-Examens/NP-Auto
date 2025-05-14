<?php

namespace App\Filament\Clusters\UserManagement\Resources\RoleResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;
}
