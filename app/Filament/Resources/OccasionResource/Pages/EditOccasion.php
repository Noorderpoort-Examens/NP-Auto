<?php

namespace App\Filament\Resources\OccasionResource\Pages;

use App\Filament\Resources\OccasionResource;
use App\Models\Reservation;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditOccasion extends EditRecord
{
    protected static string $resource = OccasionResource::class;

    // no changing the reserved status back to unreserved. seperate check for checking it to on and off when reservation is made or removed.
    protected function beforeSave(): void
    {
        $reservationExists = Reservation::where('occasion_id', $this->record->id)->exists();

        if ($reservationExists && $this->data['reserved'] === false) {
            Notification::make()
                ->title('Reservering kan niet verwijderd worden.')
                ->body('Verwijder reservering in reserveringen lijst.')
                ->danger()
                ->send();

            $this->data['reserved'] = true;
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
