<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use App\Models\Occasion;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function beforeCreate(): void
    {
        $occasion = Occasion::find($this->data['occasion_id'] ?? null);

        // make sure people cannot reserve a sold car, because if you could then it would be useless.
        if ($occasion && $occasion->sold) {
            Notification::make()
                ->title('Deze auto is al verkocht')
                ->body('Je kunt geen reservering maken voor een verkochte auto.')
                ->danger()
                ->persistent()
                ->send();

            // Stop the creation
            throw ValidationException::withMessages([
                'occasion_id' => 'Deze auto is al verkocht.',
            ]);
        }
    }

}
