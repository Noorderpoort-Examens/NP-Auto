<?php

namespace App\Filament\Clusters\UserManagement\Resources\UserResource\Pages;

use App\Filament\Clusters\UserManagement\Resources\UserResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function () {
                    if ($this->record->hasRole('admin')) {
                        Notification::make()
                            ->title('Deze gebruiker mag niet verwijderd worden.')
                            ->danger()
                            ->send();

                        $this->halt(); // Cancel full action
                    }
                }),
        ];
    }
}
