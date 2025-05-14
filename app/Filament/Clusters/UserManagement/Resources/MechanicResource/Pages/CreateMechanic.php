<?php

namespace App\Filament\Clusters\UserManagement\Resources\MechanicResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\MechanicResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMechanic extends CreateRecord
{
    protected static string $resource = MechanicResource::class;
}
